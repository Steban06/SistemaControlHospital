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
            this.paginationContainer.innerHTML = '<div class="pagination-info">No hay resultados para mostrar</div>';
            return;
        }

        let paginationHTML = '<div class="pagination">';
        
        // Botón Anterior
        paginationHTML += `<button class="pagination-btn" ${this.currentPage === 1 ? 'disabled' : ''} onclick="changePage_${this.instanceId}(${this.currentPage - 1})">
            <i class="fa-solid fa-chevron-left"></i> Anterior
        </button>`;

        // Números de página
        for (let i = 1; i <= totalPages; i++) {
            if (i === 1 || i === totalPages || (i >= this.currentPage - 1 && i <= this.currentPage + 1)) {
                paginationHTML += `<button class="pagination-btn ${i === this.currentPage ? 'active' : ''}" onclick="changePage_${this.instanceId}(${i})">${i}</button>`;
            } else if (i === this.currentPage - 2 || i === this.currentPage + 2) {
                paginationHTML += `<span class="pagination-ellipsis">...</span>`;
            }
        }

        // Botón Siguiente
        paginationHTML += `<button class="pagination-btn" ${this.currentPage === totalPages ? 'disabled' : ''} onclick="changePage_${this.instanceId}(${this.currentPage + 1})">
            Siguiente <i class="fa-solid fa-chevron-right"></i>
        </button>`;

        paginationHTML += '</div>';
        paginationHTML += `<div class="pagination-info">Mostrando ${Math.min((this.currentPage - 1) * this.rowsPerPage + 1, this.filteredRows.length)} - ${Math.min(this.currentPage * this.rowsPerPage, this.filteredRows.length)} de ${this.filteredRows.length} resultados</div>`;
        
        this.paginationContainer.innerHTML = paginationHTML;
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

