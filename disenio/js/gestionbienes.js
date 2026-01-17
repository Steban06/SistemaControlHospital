// Funciones JS para la gestión de bienes y modales de AC

function openRegistACModal() {
    const modal = document.getElementById('modalRegistACContainer');
    if (modal) {
        modal.classList.remove('hidden');
    } else {
        console.error('Modal container registr AC not found');
    }
}

function closeRegistACModal() {
    const modal = document.getElementById('modalRegistACContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}

function openACModal() {
    const modal = document.getElementById('modalACContainer');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeACModal() {
    const modal = document.getElementById('modalACContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}

function openMaintenanceACModal() {
    // Cerrar el modal de AC primero
    closeACModal();

    const modal = document.getElementById('modalMaintenanceACContainer');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeMaintenanceACModal() {
    const modal = document.getElementById('modalMaintenanceACContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}

function openRepairModal() {
    // Cerrar el modal de AC primero
    closeACModal();

    const modal = document.getElementById('modalRepairContainer');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeRepairModal() {
    const modal = document.getElementById('modalRepairContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}

// === Tab Switching for AC Modal ===
function switchACTab(tabId) {
    // Hide all tab contents
    const allTabs = document.querySelectorAll('.ac-tab-content');
    allTabs.forEach(tab => tab.classList.add('hidden'));

    // Remove active state from all buttons
    const allButtons = document.querySelectorAll('.ac-tab-btn');
    allButtons.forEach(btn => {
        btn.classList.remove('text-blue-600', 'border-blue-600');
        btn.classList.add('text-slate-500', 'border-transparent');
    });

    // Show selected tab
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.remove('hidden');
    }

    // Activate selected button
    const selectedBtn = document.getElementById('btn-' + tabId);
    if (selectedBtn) {
        selectedBtn.classList.remove('text-slate-500', 'border-transparent');
        selectedBtn.classList.add('text-blue-600', 'border-blue-600');
    }
}



// === Regist Modal (Generic Bien) ===
function openModal() {
    const modal = document.getElementById('modalContainer');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeModal() {
    const modalBg = document.getElementById("modalContainer");
    if (modalBg) modalBg.classList.add('hidden');

    // Also close edit modal if open
    const editModal = document.getElementById("modalEditContainer");
    if (editModal) editModal.classList.add('hidden');

    const viewModal = document.getElementById("modalViewContainer");
    if (viewModal) viewModal.classList.add('hidden');
}

// === View Modal ===
function openViewModal() {
    const modal = document.getElementById('modalViewContainer');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeViewModal() {
    const modal = document.getElementById('modalViewContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}

// === Edit Modal ===
function openEditModal() {
    const modal = document.getElementById('modalEditContainer');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeEditModal() {
    const modal = document.getElementById('modalEditContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}

// === Edit AC Modal ===
function openEditACModal() {
    // Cerrar el modal de visualización de AC
    closeACModal();

    // Abrir el modal de edición de AC (reutilizando el modal de edición genérico)
    const modal = document.getElementById('modalEditContainer');
    if (modal) {
        modal.classList.remove('hidden');
    }
}

function closeEditACModal() {
    const modal = document.getElementById('modalEditContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}


// Ensure global scope
window.openModal = openModal;
window.closeModal = closeModal;
window.openRegistACModal = openRegistACModal;
window.closeRegistACModal = closeRegistACModal;
window.openACModal = openACModal;
window.closeACModal = closeACModal;
window.openMaintenanceACModal = openMaintenanceACModal;
window.closeMaintenanceACModal = closeMaintenanceACModal;
window.openRepairModal = openRepairModal;
window.closeRepairModal = closeRepairModal;
window.openViewModal = openViewModal;
window.closeViewModal = closeViewModal;
window.openEditModal = openEditModal;
window.closeEditModal = closeEditModal;
window.openEditACModal = openEditACModal;
window.closeEditACModal = closeEditACModal;
window.switchACTab = switchACTab;
