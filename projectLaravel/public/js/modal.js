/* ModalManager v1.0
 * Reusable modal manager for add/edit modal workflows.
 * Usage: ModalManager.init({ storeUrl, updateBaseUrl, addButtonId, modalAddId, formAddId, modalEditId, formEditId })
 */
const ModalManager = (function () {
    let cfg = {};

    function openModal(modal) {
        if (!modal) return;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeModal(modal) {
        if (!modal) return;
        modal.classList.remove('active');
        document.body.style.overflow = '';
        const form = modal.querySelector('form');
        if (form) form.reset();
    }

    function attachCloseHandlers() {
        document.querySelectorAll('.modal-overlay').forEach(modal => {
            const btnClose = modal.querySelector('[data-modal-close]');
            const btnCancel = modal.querySelector('[data-modal-cancel]');
            if (btnClose) btnClose.addEventListener('click', () => closeModal(modal));
            if (btnCancel) btnCancel.addEventListener('click', () => closeModal(modal));
            modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(modal); });
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.active').forEach(closeModal);
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
                closeModal(form.closest('.modal-overlay'));
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
