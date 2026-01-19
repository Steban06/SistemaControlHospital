/* ModalManager v1.0
 * Reusable modal manager for add/edit modal workflows.
 * Usage: ModalManager.init({ storeUrl, updateBaseUrl, addButtonId, modalAddId, formAddId, modalEditId, formEditId })
 */
const ModalManager = (function () {
    let cfg = {};

    function openModal(modal) {
        if (!modal) return;
        // Soporte para modales Tailwind (hidden) y modales antiguos (.active)
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
        } else {
            modal.classList.add('active');
        }
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modal) {
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

    function attachCloseHandlers() {
        // Soporte para modales antiguos (.modal-overlay) y nuevos (por ID o atributos)
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            const btnClose = modal.querySelector('[data-modal-close]');
            const btnCancel = modal.querySelector('[data-modal-cancel]');
            if (btnClose) btnClose.addEventListener('click', () => closeModal(modal));
            if (btnCancel) btnCancel.addEventListener('click', () => closeModal(modal));
            modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(modal); });
        });

        // Soporte para modales Tailwind con data-modal-close y data-modal-cancel
        // Buscar modales por ID que contengan "modal" o "Modal"
        document.querySelectorAll('[id*="modal" i]').forEach(modal => {
            // Adjuntar handlers al overlay de fondo si tiene data-modal-cancel
            const overlay = modal.querySelector('[data-modal-cancel]');
            if (overlay && !overlay.hasAttribute('data-handler-attached')) {
                overlay.setAttribute('data-handler-attached', 'true');
                overlay.addEventListener('click', (e) => {
                    if (e.target === overlay) closeModal(modal);
                });
            }

            // Adjuntar handlers a botones dentro del modal
            modal.querySelectorAll('[data-modal-close]').forEach(btn => {
                if (!btn.hasAttribute('data-handler-attached')) {
                    btn.setAttribute('data-handler-attached', 'true');
                    btn.addEventListener('click', () => closeModal(modal));
                }
            });

            modal.querySelectorAll('[data-modal-cancel]').forEach(btn => {
                // No adjuntar al overlay si ya lo hicimos
                if (!btn.hasAttribute('data-handler-attached') && !btn.classList.contains('fixed') && !btn.classList.contains('inset-0')) {
                    btn.setAttribute('data-handler-attached', 'true');
                    btn.addEventListener('click', () => closeModal(modal));
                }
            });
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                // Cerrar modales antiguos
                document.querySelectorAll('.modal-overlay.active').forEach(closeModal);
                // Cerrar modales Tailwind (los que no tienen hidden)
                document.querySelectorAll('[id*="modal" i]:not(.hidden)').forEach(closeModal);
            }
        });
    }

    function handleFormSubmit(form, url, method) {
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn ? submitBtn.innerHTML : '';
        if (submitBtn) { submitBtn.disabled = true; submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Guardando...'; }

        const csrfTokenInput = document.querySelector('input[name="_token"]');
        const csrfToken = csrfTokenInput ? csrfTokenInput.value : '';
        const formData = new FormData(form);

        // console.log('Submitting form to', url, 'with method', method);
        // console.log('Form data:', formData);
        // console.log('CSRF token:', csrfToken);

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
                alert(data.message || 'Operación realizada con éxito');
                // Buscar el modal padre (soporta ambas estructuras)
                const modal = form.closest('.modal-overlay') || form.closest('[id*="ModalOverlay"]') || form.closest('[id*="modal"]');
                if (modal) closeModal(modal);
                window.location.reload();
            } else {
                let errorMessage = 'Error al guardar:\n';
                if (data.errors) {
                    Object.keys(data.errors).forEach(key => { errorMessage += '- ' + data.errors[key][0] + '\n'; });
                } else {
                    errorMessage += data.message || 'Error desconocido';
                }
                alert(errorMessage);
                if (submitBtn) { submitBtn.disabled = false; submitBtn.innerHTML = originalBtnText; }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al procesar la solicitud. Por favor, intente nuevamente.');
            if (submitBtn) { submitBtn.disabled = false; submitBtn.innerHTML = originalBtnText; }
        });
    }

    function init(options) {
        cfg = Object.assign({
            addButtonId: 'btnAddBien',
            modalAddId: 'modalAddBien',
            formAddId: 'formAddBien',
            modalEditId: 'modalEditBien',
            formEditId: 'formEditBien'
        }, options || {});

        attachCloseHandlers();

        // Bind Add
        const btnAdd = document.getElementById(cfg.addButtonId);
        const modalAdd = document.getElementById(cfg.modalAddId);
        const formAdd = document.getElementById(cfg.formAddId);
        if (btnAdd && modalAdd) btnAdd.addEventListener('click', () => openModal(modalAdd));
        if (formAdd) {
            formAdd.addEventListener('submit', function (e) {
                e.preventDefault();
                if (!cfg.storeUrl) { alert('No storeUrl configured for ModalManager'); return; }
                handleFormSubmit(formAdd, cfg.storeUrl, 'POST');
            });
        }

        // Bind Edit
        const modalEdit = document.getElementById(cfg.modalEditId);
        const formEdit = document.getElementById(cfg.formEditId);

        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.btn-edit');
            if (!btn) return;
            if (!modalEdit || !formEdit) return;

            const data = btn.dataset || {};

            // populate form fields
            const setVal = (selector, value) => {
                const el = formEdit.querySelector(selector);
                if (el) el.value = value || '';
            };

            setVal('#editId', data.id);
            setVal('#editNumeroBN', data.numero);
            setVal('#editNombreBien', data.nombre);
            setVal('#editMarcaBien', data.marca);
            setVal('#editModeloBien', data.modelo);
            setVal('#editSerialBien', data.serial);
            setVal('#editUbicacionBien', data.area);
            setVal('#editCategoriaBien', data.categoria);
            setVal('#editEstadoBien', data.estado);

            formEdit.dataset.recordId = data.id || '';

            openModal(modalEdit);
        });

        if (formEdit) {
            formEdit.addEventListener('submit', function (e) {
                e.preventDefault();
                const id = formEdit.dataset.recordId;
                if (!id) { alert('No se encontró el ID del registro a actualizar.'); return; }
                if (!cfg.updateBaseUrl) { alert('No updateBaseUrl configured for ModalManager'); return; }
                const url = cfg.updateBaseUrl + '/' + id;

                // Spoof HTTP method using hidden input so Laravel parses the form data correctly
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'PUT';
                formEdit.appendChild(methodInput);

                handleFormSubmit(formEdit, url, 'POST');
            });
        }
    }

    return {
        init: init,
        openModal: openModal,
        closeModal: closeModal
    };
})();
