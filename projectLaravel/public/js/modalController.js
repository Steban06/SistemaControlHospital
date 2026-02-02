const ModalManagerE = (function () {
    let idRef = {};

    function openModalE(modal) {
        if (!modal) return;
        // Soporte para modales Tailwind (hidden) y modales antiguos (.active)
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('active');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeModalE(modal) {
        if (!modal) return;
        // Soporte para modales Tailwind (hidden) y modales antiguos (.active)
        if (modal.classList.contains('hidden') === false && !modal.classList.contains('modal-overlay')) {
            // Es un modal Tailwind, agregar hidden
            modal.classList.add('hidden');
        } else {
            // Es un modal antiguo, remover active
            modal.classList.remove('active');
        }
        document.body.style.overflow = '';
        const form = modal.querySelector('form');
        if (form) form.reset();
    }

    function manejadoresCierreModals() {
        // Soporte para modales antiguos (.modal-overlay) y nuevos (por ID o atributos)
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            const btnClose = modal.querySelector('[data-modal-close]');
            const btnCancel = modal.querySelector('[data-modal-cancel]');
            if (btnClose) btnClose.addEventListener('click', () => closeModalE(modal));
            if (btnCancel) btnCancel.addEventListener('click', () => closeModalE(modal));
            modal.addEventListener('click', function (e) { if (e.target === modal) closeModalE(modal); });
        });

        // Soporte para modales Tailwind con data-modal-close y data-modal-cancel
        // Buscar modales por ID que contengan "modal" o "Modal"
        document.querySelectorAll('[id*="modal" i]').forEach(modal => {
            // Adjuntar handlers al overlay de fondo si tiene data-modal-cancel
            const overlay = modal.querySelector('[data-modal-cancel]');
            if (overlay && !overlay.hasAttribute('data-handler-attached')) {
                overlay.setAttribute('data-handler-attached', 'true');
                overlay.addEventListener('click', (e) => {
                    if (e.target === overlay) closeModalE(modal);
                });
            }

            // Adjuntar handlers a botones dentro del modal
            modal.querySelectorAll('[data-modal-close]').forEach(btn => {
                if (!btn.hasAttribute('data-handler-attached')) {
                    btn.setAttribute('data-handler-attached', 'true');
                    btn.addEventListener('click', () => closeModalE(modal));
                }
            });

            modal.querySelectorAll('[data-modal-cancel]').forEach(btn => {
                // No adjuntar al overlay si ya lo hicimos
                if (!btn.hasAttribute('data-handler-attached') && !btn.classList.contains('fixed') && !btn.classList.contains('inset-0')) {
                    btn.setAttribute('data-handler-attached', 'true');
                    btn.addEventListener('click', () => closeModalE(modal));
                }
            });
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                // Cerrar modales antiguos
                document.querySelectorAll('.modal-overlay.active').forEach(closeModalE);
                // Cerrar modales Tailwind (los que no tienen hidden)
                document.querySelectorAll('[id*="modal" i]:not(.hidden)').forEach(closeModalE);
            }
        });
    }

    // Función para manejar el envío del formulario
    function manejoEnvioFormularioRegis(form, url, method) {
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn ? submitBtn.innerHTML : '';
        if (submitBtn) { submitBtn.disabled = true; submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Guardando...'; }

        const csrfTokenInput = document.querySelector('input[name="_token"]');
        const csrfToken = csrfTokenInput ? csrfTokenInput.value : '';
        const formData = new FormData(form);

        fetch(url, {
            method: method,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: data.message || 'Operación realizada con éxito'
                    }).then(() => {
                        // Buscar el modal padre (soporta ambas estructuras)
                        // const modal = form.closest('.modal-overlay') || form.closest('[id*="ModalOverlay"]') || form.closest('[id*="modal"]');
                        // if (modal) closeModal(modal);
                        window.location.reload();
                    });
                } else {
                    let errorMessage = 'Error al guardar:\n';
                    if (data.errors) {
                        Object.keys(data.errors).forEach(key => { errorMessage += '- ' + data.errors[key][0] + '\n'; });
                    } else {
                        errorMessage += data.message || 'Error desconocido';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage
                    });
                    if (submitBtn) { submitBtn.disabled = false; submitBtn.innerHTML = originalBtnText; }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error al procesar la solicitud. Por favor, intente nuevamente.'
                });
                if (submitBtn) { submitBtn.disabled = false; submitBtn.innerHTML = originalBtnText; }
            });
    }

    function init(config) {
        idRef = config || {
            storeUrl: config.storeUrl,
            updateUrl: config.updateUrl,
            botonAdd: config.botonAdd,
            modalAdd: config.modalAdd,
            formAdd: config.formAdd
        };

        manejadoresCierreModals();

        const botonAdd = idRef.botonAdd;
        const modalAdd = idRef.modalAdd;
        const formAdd = idRef.formAdd;

        if (botonAdd && modalAdd) botonAdd.addEventListener('click', () => openModalE(modalAdd));

        if (formAdd) {
            formAdd.addEventListener('submit', function (e) {
                e.preventDefault();
                // Aquí puedes agregar la lógica para manejar el envío del formulario
                console.log('Formulario enviado');
                if (!idRef.storeUrl) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Configuration Error',
                        text: 'No storeUrl configured for ModalManager'
                    });
                    return;
                }
                manejoEnvioFormularioRegis(formAdd, idRef.storeUrl, 'POST');
            });
        }

    }

    return {
        init: init,
        openModal: openModalE,
        closeModal: closeModalE
    };
})();