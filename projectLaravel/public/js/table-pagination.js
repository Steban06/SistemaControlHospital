/**
 * Sistema de búsqueda, filtrado y paginación para tablas
 * Reutilizable para múltiples vistas
 * 
 * @param {Object} config - Configuración del sistema de tabla
 * @param {string} config.searchInputId - ID del input de búsqueda
 * @param {string} config.tableBodyId - ID del tbody de la tabla
 * @param {string} config.paginationContainerId - ID del contenedor de paginación
 * @param {string} config.rowsPerPageSelectId - ID del select de filas por página
 * @param {number} config.defaultRowsPerPage - Número de filas por página por defecto (default: 10)
 * @param {string} config.tableContainerSelector - Selector del contenedor de la tabla para scroll (default: '.table-container')
 * @param {Function} config.onAddButtonClick - Callback para el botón de agregar (opcional)
 * @param {string} config.addButtonId - ID del botón de agregar (opcional)
 */
class TablePagination {
    constructor(config) {
        // Validar configuración requerida
        if (!config.searchInputId || !config.tableBodyId || !config.paginationContainerId) {
            console.error('TablePagination: Se requieren searchInputId, tableBodyId y paginationContainerId');
            return;
        }

        // Configuración
        this.searchInput = document.getElementById(config.searchInputId);
        this.tableBody = document.getElementById(config.tableBodyId);
        this.paginationContainer = document.getElementById(config.paginationContainerId);
        this.rowsPerPageSelect = config.rowsPerPageSelectId 
            ? document.getElementById(config.rowsPerPageSelectId) 
            : null;
        this.tableContainerSelector = config.tableContainerSelector || '.table-container';
        this.defaultRowsPerPage = config.defaultRowsPerPage || 10;
        this.onAddButtonClick = config.onAddButtonClick || null;
        this.addButtonId = config.addButtonId || null;

        // Estado
        this.currentPage = 1;
        this.rowsPerPage = this.defaultRowsPerPage;
        this.allRows = [];
        this.filteredRows = [];
        this.instanceId = 'tablePagination_' + Date.now();

        // Validar elementos del DOM
        if (!this.searchInput || !this.tableBody || !this.paginationContainer) {
            console.error('TablePagination: No se encontraron todos los elementos requeridos en el DOM');
            return;
        }

        // Inicializar
        this.init();
    }

    init() {
        // Obtener todas las filas
        this.allRows = Array.from(this.tableBody.querySelectorAll('tr'));
        this.filteredRows = this.allRows;

        // Configurar valor por defecto del select si existe
        if (this.rowsPerPageSelect) {
            this.rowsPerPage = parseInt(this.rowsPerPageSelect.value) || this.defaultRowsPerPage;
        }

        // Event listeners
        this.setupEventListeners();

        // Inicializar la tabla
        this.displayTable();
    }

    setupEventListeners() {
        // Event listener para el input de búsqueda
        this.searchInput.addEventListener('input', () => this.filterTable());
        this.searchInput.addEventListener('keyup', () => this.filterTable());

        // Event listener para el select de filas por página
        if (this.rowsPerPageSelect) {
            this.rowsPerPageSelect.addEventListener('change', () => this.changeRowsPerPage());
        }

        // Event listener para el botón de agregar (si existe)
        if (this.addButtonId) {
            const addButton = document.getElementById(this.addButtonId);
            if (addButton && this.onAddButtonClick) {
                addButton.addEventListener('click', this.onAddButtonClick);
            }
        }

        // Función global para cambiar de página (necesaria para los onclick)
        window['changePage_' + this.instanceId] = (page) => this.changePage(page);
    }

    /**
     * Filtra las filas de la tabla según el término de búsqueda
     */
    filterTable() {
        const searchTerm = this.searchInput.value.toLowerCase().trim();
        
        if (searchTerm === '') {
            this.filteredRows = this.allRows;
        } else {
            this.filteredRows = this.allRows.filter(row => {
                const cells = row.querySelectorAll('td');
                return Array.from(cells).some(cell => {
                    // Excluir la columna de acciones de la búsqueda
                    if (cell.querySelector('button')) {
                        return false;
                    }
                    return cell.textContent.toLowerCase().includes(searchTerm);
                });
            });
        }
        
        this.currentPage = 1; // Resetear a la primera página al filtrar
        this.displayTable();
    }

    /**
     * Muestra las filas según la página actual
     */
    displayTable() {
        // Ocultar todas las filas
        this.allRows.forEach(row => {
            row.style.display = 'none';
        });

        // Calcular el rango de filas a mostrar
        const start = (this.currentPage - 1) * this.rowsPerPage;
        const end = start + this.rowsPerPage;
        const rowsToShow = this.filteredRows.slice(start, end);

        // Mostrar las filas de la página actual
        rowsToShow.forEach(row => {
            row.style.display = '';
        });

        // Actualizar la paginación
        this.updatePagination();
    }

    /**
     * Actualiza los controles de paginación
     */
    updatePagination() {
        const totalPages = Math.ceil(this.filteredRows.length / this.rowsPerPage);
        
        if (totalPages <= 0) {
            this.paginationContainer.innerHTML = '<div class="flex flex-col sm:flex-row justify-between items-center gap-4 mt-4 text-sm text-gray-500 border-t pt-4">No hay resultados para mostrar</div>';
            return;
        }

        const startResult = Math.min((this.currentPage - 1) * this.rowsPerPage + 1, this.filteredRows.length);
        const endResult = Math.min(this.currentPage * this.rowsPerPage, this.filteredRows.length);
        const totalResults = this.filteredRows.length;

        let paginationHTML = '<div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-gray-500 border-t py-4">';
        
        // Texto informativo
        paginationHTML += `<span>Mostrando <span class="font-bold text-gray-900">${startResult}</span> a <span class="font-bold text-gray-900">${endResult}</span> de <span class="font-bold text-gray-900">${totalResults}</span> resultados</span>`;

        // Contenedor de botones
        paginationHTML += '<div class="inline-flex items-center gap-1">';
        
        // Botón Anterior
        const prevDisabled = this.currentPage === 1;
        paginationHTML += `<button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 ${prevDisabled ? 'disabled opacity-50 cursor-not-allowed' : 'cursor-pointer'} text-gray-600" ${prevDisabled ? 'disabled' : ''} onclick="changePage_${this.instanceId}(${this.currentPage - 1})">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left">
                <path d="m15 18-6-6 6-6" />
            </svg>
        </button>`;

        // Números de página
        const pages = [];
        
        if (totalPages <= 7) {
            // Mostrar todas las páginas si son 7 o menos
            for (let i = 1; i <= totalPages; i++) {
                pages.push(i);
            }
        } else {
            // Siempre mostrar primera página
            pages.push(1);
            
            // Determinar el rango de páginas visibles alrededor de la página actual
            let startPage = Math.max(2, this.currentPage - 1);
            let endPage = Math.min(totalPages - 1, this.currentPage + 1);
            
            // Ajustar si estamos cerca del inicio
            if (this.currentPage <= 3) {
                endPage = Math.min(4, totalPages - 1);
            }
            
            // Ajustar si estamos cerca del final
            if (this.currentPage >= totalPages - 2) {
                startPage = Math.max(2, totalPages - 3);
            }
            
            // Agregar puntos suspensivos antes si es necesario
            if (startPage > 2) {
                pages.push('ellipsis-start');
            }
            
            // Agregar páginas visibles
            for (let i = startPage; i <= endPage; i++) {
                pages.push(i);
            }
            
            // Agregar puntos suspensivos después si es necesario
            if (endPage < totalPages - 1) {
                pages.push('ellipsis-end');
            }
            
            // Siempre mostrar última página
            if (totalPages > 1) {
                pages.push(totalPages);
            }
        }

        // Generar botones de números
        pages.forEach((page, index) => {
            if (page === 'ellipsis-start' || page === 'ellipsis-end') {
                paginationHTML += '<span class="px-1 text-gray-400">...</span>';
            } else {
                const isActive = page === this.currentPage;
                
                const baseClasses = "w-8 h-8 flex items-center justify-center rounded-md border text-sm transition-all duration-200 cursor-pointer";
                
                let stateClasses = "";
                
                if (isActive) stateClasses = "bg-blue-600 border-blue-600 text-white font-bold hover:bg-blue-800 shadow-sm";
                else stateClasses = "bg-white border-gray-200 text-gray-600 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300";
        
                paginationHTML += `
                    <button type="button" class="${baseClasses} ${stateClasses}" onclick="changePage_${this.instanceId}(${page})">
                        ${page}
                    </button>`;
            }
        });

        // Botón Siguiente
        const nextDisabled = this.currentPage === totalPages;
        paginationHTML += `<button class="p-2 rounded-md border border-gray-200 bg-white hover:bg-gray-50 ${nextDisabled ? 'disabled opacity-50 cursor-not-allowed' : 'cursor-pointer'} text-gray-600" ${nextDisabled ? 'disabled' : ''} onclick="changePage_${this.instanceId}(${this.currentPage + 1})">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </button>`;

        paginationHTML += '</div>'; // Cierre del contenedor de botones
        paginationHTML += '</div>'; // Cierre del contenedor principal
        
        this.paginationContainer.innerHTML = paginationHTML;
        
        // Aplicar la clase new_pagination al contenedor si no la tiene
        // if (!this.paginationContainer.classList.contains('new_pagination')) {
        //     this.paginationContainer.classList.add('new_pagination');
        // }
    }

    /**
     * Cambia a una página específica
     */
    changePage(page) {
        const totalPages = Math.ceil(this.filteredRows.length / this.rowsPerPage);
        if (page >= 1 && page <= totalPages) {
            this.currentPage = page;
            this.displayTable();
            // Scroll suave hacia la tabla
            const tableContainer = document.querySelector(this.tableContainerSelector);
            if (tableContainer) {
                tableContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    }

    /**
     * Cambia el número de filas por página
     */
    changeRowsPerPage() {
        if (this.rowsPerPageSelect) {
            this.rowsPerPage = parseInt(this.rowsPerPageSelect.value) || this.defaultRowsPerPage;
        }
        this.currentPage = 1; // Resetear a la primera página al cambiar el número de filas
        this.displayTable();
    }

    /**
     * Recarga las filas de la tabla (útil cuando se agregan filas dinámicamente)
     */
    reloadRows() {
        this.allRows = Array.from(this.tableBody.querySelectorAll('tr'));
        this.filteredRows = this.allRows;
        this.currentPage = 1;
        this.displayTable();
    }
}

