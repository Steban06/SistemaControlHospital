// Maintenance Wizard Logic

let currentStep = 1;
let selectedAsset = null;

// Main initialization function
function initMaintenanceWizard() {
    console.log('🔄 INIT: Starting Maintenance Wizard Initialization...');
    currentStep = 1; // Reset step on init
    selectedAsset = null; // Reset selection
    console.log('✅ INIT: Reset currentStep to 1, selectedAsset to null');

    // Reset UI state
    document.querySelectorAll('.asset-item').forEach(i => {
        i.classList.remove('bg-blue-100', 'border-blue-500');
        const check = i.querySelector('.check-icon');
        if (check) check.classList.add('hidden');
    });
    console.log('✅ INIT: Cleared asset selections');

    // Reset steps visibility
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');

    if (step1) step1.classList.remove('hidden');
    if (step2) step2.classList.add('hidden');
    if (step3) step3.classList.add('hidden');
    console.log('✅ INIT: Set step visibility (1=visible, 2&3=hidden)');

    // Reset Step 1 Card Visibility
    const cardStep1 = document.getElementById('selectedAssetCard-step1');
    const headerStep1 = document.getElementById('step1-header-info');
    if (cardStep1) cardStep1.classList.add('hidden');
    if (headerStep1) headerStep1.classList.remove('hidden');
    console.log('✅ INIT: Reset Step 1 card visibility');

    // Reset indicators
    resetIndicators();
    console.log('✅ INIT: Reset wizard indicators');

    initializeAssetSelection();
    console.log('✅ INIT: Initialized asset selection listeners');

    initializeSearch();
    console.log('✅ INIT: Initialized search');

    initializeFormMonitoring();
    console.log('✅ INIT: Initialized form monitoring');

    // Reset Parts Section to initial state (1 empty row)
    const partsContainer = document.getElementById('parts-container');
    if (partsContainer) {
        partsContainer.innerHTML = `
            <div class="flex gap-2">
                <input name="partes[]" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive flex-1" placeholder="Ej: Filtro de aire, Capacitor 50uF, etc." value="">
                <button type="button" class="btn-remove-part inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background text-foreground hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 flex-shrink-0">Eliminar</button>
            </div>`;
    }

    initializePartsSection();
    console.log('✅ INIT: Initialized parts section');

    // Attach global functions to window
    window.nextStep = nextStep;
    window.previousStep = previousStep;
    window.submitMaintenance = submitMaintenance;
    window.closeRegisterModal = closeRegisterModal;
    console.log('✅ INIT: Attached global functions to window');

    // CRITICAL: Update buttons LAST
    console.log('🔵 INIT: About to call updateButtons()...');
    updateButtons();
    console.log('✅ INIT: Initialization complete!');
}

function initializePartsSection() {
    console.log('🔄 PARTS: Initializing dynamic parts section...');
    const btnAdd = document.getElementById('btn-add-part');
    const container = document.getElementById('parts-container');

    if (!btnAdd || !container) {
        console.warn('⚠️ PARTS: Button or container not found', { btnAdd: !!btnAdd, container: !!container });
        return;
    }

    // Remove old listener by cloning
    const newBtn = btnAdd.cloneNode(true);
    btnAdd.parentNode.replaceChild(newBtn, btnAdd);

    newBtn.addEventListener('click', function () {
        console.log('➕ PARTS: Adding new part row');
        const row = document.createElement('div');
        row.className = 'flex gap-2';
        row.innerHTML = `
            <input name="partes[]" data-slot="input" class="file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border px-3 py-1 text-base bg-input-background transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive flex-1" placeholder="Ej: Filtro de aire, Capacitor 50uF, etc." value="">
            <button type="button" class="btn-remove-part inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background text-foreground hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[>svg]:px-2.5 flex-shrink-0">Eliminar</button>
        `;
        container.appendChild(row);
    });

    // Delegation for remove
    container.onclick = function (e) {
        if (e.target.classList.contains('btn-remove-part') || e.target.closest('.btn-remove-part')) {
            console.log('➖ PARTS: Removing part row');
            const btn = e.target.classList.contains('btn-remove-part') ? e.target : e.target.closest('.btn-remove-part');
            const row = btn.closest('.flex');
            if (row) row.remove();
        }
    };
}

// Run initialization immediately if script is loaded efficiently, or wait for DOM
if (document.readyState === 'loading') {
    console.log('⏳ Document still loading, waiting for DOMContentLoaded...');
    document.addEventListener('DOMContentLoaded', initMaintenanceWizard);
} else {
    console.log('✅ Document already loaded, running initMaintenanceWizard immediately');
    initMaintenanceWizard();
}

function resetIndicators() {
    // Step 1 Active
    const s1 = document.getElementById('step1-indicator');
    if (s1) {
        s1.classList.remove('step-inactive');
        s1.classList.add('step-active');
    }

    // Step 2 Inactive
    const s2 = document.getElementById('step2-indicator');
    if (s2) {
        s2.classList.remove('step-active');
        s2.classList.add('step-inactive');
    }

    // Progress 1
    const p1 = document.getElementById('progress1');
    if (p1) {
        p1.classList.remove('line-active');
        p1.classList.add('line-inactive');
    }

    // Step 3 Inactive
    const s3 = document.getElementById('step3-indicator');
    if (s3) {
        s3.classList.remove('step-active');
        s3.classList.add('step-inactive');
    }

    // Progress 2
    const p2 = document.getElementById('progress2');
    if (p2) {
        p2.classList.remove('line-active');
        p2.classList.add('line-inactive');
    }
}

function initializeAssetSelection() {
    const items = document.querySelectorAll('.asset-item');
    if (items.length === 0) console.warn('No asset items found to initialize.');

    items.forEach(item => {
        // Remove old listeners to prevent duplicates if re-initialized
        const newClone = item.cloneNode(true);
        item.parentNode.replaceChild(newClone, item);

        newClone.addEventListener('click', function () {
            // Remove previous selection from ALL items
            document.querySelectorAll('.asset-item').forEach(i => {
                i.classList.remove('bg-blue-100', 'border-blue-500');
                // Hide check icon
                const check = i.querySelector('.check-icon');
                if (check) check.classList.add('hidden');
            });

            // Add selection to current item
            this.classList.add('bg-blue-100', 'border-blue-500');

            // Show check icon for THIS item
            const activeCheck = this.querySelector('.check-icon');
            if (activeCheck) activeCheck.classList.remove('hidden');

            // Store selected asset
            selectedAsset = {
                id: this.dataset.assetId,
                code: this.dataset.assetCode,
                type: this.dataset.assetType,
                name: this.querySelector('.asset-name').textContent
            };

            // Enable next button
            const btnNext = document.getElementById('btnNext');
            if (btnNext) btnNext.disabled = false;

            // SHOW CARD IN STEP 1
            const cardStep1 = document.getElementById('selectedAssetCard-step1');
            const headerStep1 = document.getElementById('step1-header-info');

            if (cardStep1) {
                // Populate Card
                document.getElementById('selected-asset-code-step1').textContent = selectedAsset.code;
                document.getElementById('selected-asset-name-step1').textContent = selectedAsset.name;
                document.getElementById('selected-asset-type-text-step1').textContent = selectedAsset.type;

                // Icon Logic Step 1
                const badgeStep1 = document.getElementById('selected-asset-badge-step1');
                if (badgeStep1) {
                    const existingSvg = badgeStep1.querySelector('svg');
                    if (existingSvg) existingSvg.remove();

                    let iconSvg = '';
                    // Define base classes that are always present + custom base
                    const baseClasses = "badge-base "; // using the custom css class

                    if (selectedAsset.type === 'Bien Nacional') {
                        iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path><path d="M12 22V12"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><path d="m7.5 4.27 9 5.15"></path></svg>`;
                        // Apply Blue Styles via Class
                        badgeStep1.className = baseClasses + 'badge-bn';
                        // Remove inline styles to let CSS class handle it
                        badgeStep1.removeAttribute('style');

                    } else {
                        iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-4 h-4"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>`;
                        // Apply Cyan Styles via Class
                        badgeStep1.className = baseClasses + 'badge-ac';
                        // Remove inline styles to let CSS class handle it
                        badgeStep1.removeAttribute('style');
                    }
                    badgeStep1.insertAdjacentHTML('afterbegin', iconSvg);
                }

                // Toggle Visibilities
                cardStep1.classList.remove('hidden');
                if (headerStep1) headerStep1.classList.add('hidden');
            }
        });
    });
}

function initializeSearch() {
    const searchInput = document.getElementById('assetSearch');
    const noResultsMsg = document.getElementById('noResultsMessage');

    if (searchInput) {
        // Remove old listener
        const newInput = searchInput.cloneNode(true);
        searchInput.parentNode.replaceChild(newInput, searchInput);

        newInput.addEventListener('input', function (e) {
            const searchTerm = e.target.value.toLowerCase();
            let visibleCount = 0;

            document.querySelectorAll('.asset-item').forEach(item => {
                const text = item.textContent.toLowerCase();
                const isMatch = text.includes(searchTerm);

                item.style.display = isMatch ? 'block' : 'none';
                if (isMatch) visibleCount++;
            });

            // Toggle No Results Message
            if (noResultsMsg) {
                if (visibleCount === 0) {
                    noResultsMsg.classList.remove('hidden');
                } else {
                    noResultsMsg.classList.add('hidden');
                }
            }
        });
    }
}

function initializeFormMonitoring() {
    const inputs = ['tipo', 'fecha_realizada', 'tecnico', 'descripcion'];
    inputs.forEach(id => {
        const input = document.getElementById(id);
        if (input) {
            input.removeEventListener('input', updateButtons);
            input.removeEventListener('change', updateButtons);
            input.addEventListener(id === 'tecnico' || id === 'descripcion' ? 'input' : 'change', updateButtons);
        }
    });
}

function nextStep() {
    if (currentStep < 3) {
        // Hide current step
        document.getElementById(`step${currentStep}`).classList.add('hidden');

        // Update progress line to blue
        const progress = document.getElementById(`progress${currentStep}`);
        if (progress) {
            progress.classList.remove('line-inactive');
            progress.classList.add('line-active');
        }

        // Move to next step
        currentStep++;

        // Show next step
        document.getElementById(`step${currentStep}`).classList.remove('hidden');

        // Update indicators
        const indicator = document.getElementById(`step${currentStep}-indicator`);
        const label = document.getElementById(`step${currentStep}-label`);

        if (indicator) {
            indicator.classList.remove('step-inactive');
            indicator.classList.add('step-active');
        }
        if (label) {
            label.classList.remove('label-inactive');
            label.classList.add('label-active');
        }

        // Update buttons
        updateButtons();

        if (currentStep === 3) {
            updateSummary();
        }

        // Update Selected Asset Card if entering Step 2
        if (currentStep === 2 && selectedAsset) {
            const codeEl = document.getElementById('selected-asset-code');
            const nameEl = document.getElementById('selected-asset-name');
            const typeTextEl = document.getElementById('selected-asset-type-text');

            if (codeEl) codeEl.textContent = selectedAsset.code;
            if (nameEl) nameEl.textContent = selectedAsset.name;
            if (typeTextEl) typeTextEl.textContent = selectedAsset.type;

            // Icon logic
            const badge = document.getElementById('selected-asset-badge');
            if (badge) {
                const existingSvg = badge.querySelector('svg');
                if (existingSvg) existingSvg.remove();

                let iconSvg = '';
                if (selectedAsset.type === 'Bien Nacional') {
                    // Package Icon
                    iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-package w-4 h-4"><path d="M11 21.73a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73z"></path><path d="M12 22V12"></path><polyline points="3.29 7 12 12 20.71 7"></polyline><path d="m7.5 4.27 9 5.15"></path></svg>`;
                } else {
                    // Wind/Air Icon
                    iconSvg = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wind w-4 h-4"><path d="M12.8 19.6A2 2 0 1 0 14 16H2"></path><path d="M17.5 8a2.5 2.5 0 1 1 2 4H2"></path><path d="M9.8 4.4A2 2 0 1 1 11 8H2"></path></svg>`;
                }
                badge.insertAdjacentHTML('afterbegin', iconSvg);
            }
        }
    }
}

function previousStep() {
    if (currentStep > 1) {
        document.getElementById(`step${currentStep}`).classList.add('hidden');

        const indicator = document.getElementById(`step${currentStep}-indicator`);
        const label = document.getElementById(`step${currentStep}-label`);

        if (indicator) {
            indicator.classList.remove('step-active');
            indicator.classList.add('step-inactive');
        }
        if (label) {
            label.classList.remove('label-active');
            label.classList.add('label-inactive');
        }

        currentStep--;

        // Revert progress line
        const progress = document.getElementById(`progress${currentStep}`);
        if (progress) {
            progress.classList.remove('line-active');
            progress.classList.add('line-inactive');
        }

        document.getElementById(`step${currentStep}`).classList.remove('hidden');
        updateButtons();
    }
}


function updateButtons() {
    console.log('🔵 UPDATE_BUTTONS: Called for step', currentStep);

    const btnPrevious = document.getElementById('btnPrevious');
    const btnNext = document.getElementById('btnNext');
    const btnSubmit = document.getElementById('btnSubmit');

    if (!btnPrevious || !btnNext || !btnSubmit) {
        console.error('❌ UPDATE_BUTTONS: One or more buttons not found!', {
            btnPrevious: !!btnPrevious,
            btnNext: !!btnNext,
            btnSubmit: !!btnSubmit
        });
        return;
    }

    console.log('🔵 UPDATE_BUTTONS: Resetting visibility via inline styles...');

    // Reset all to hidden using inline styles (force override)
    btnPrevious.style.display = 'none';
    btnNext.style.display = 'none';
    btnSubmit.style.display = 'none';

    // Logic per step
    if (currentStep === 1) {
        console.log('🔵 UPDATE_BUTTONS: Step 1 - Showing Next button only');
        // Step 1: Only Next is visible
        btnNext.style.display = 'inline-flex';
        btnNext.classList.remove('hidden'); // Ensure class removed too just in case

        btnNext.disabled = !selectedAsset;
        console.log('✅ UPDATE_BUTTONS: Next button visible, disabled=', !selectedAsset);
    } else if (currentStep === 2) {
        console.log('🔵 UPDATE_BUTTONS: Step 2 - Showing Previous and Next');
        // Step 2: Previous and Next visible
        btnPrevious.style.display = 'inline-flex';
        btnPrevious.classList.remove('hidden');

        btnNext.style.display = 'inline-flex';
        btnNext.classList.remove('hidden');

        // Validation for Step 2
        const tipo = document.getElementById('tipo').value;
        const fecha = document.getElementById('fecha_realizada').value;
        const tecnico = document.getElementById('tecnico').value;
        const descripcion = document.getElementById('descripcion').value;
        btnNext.disabled = !(tipo && fecha && tecnico && descripcion);
    } else if (currentStep === 3) {
        console.log('🔵 UPDATE_BUTTONS: Step 3 - Showing Previous and Submit');
        // Step 3: Previous and Submit visible
        btnPrevious.style.display = 'inline-flex';
        btnPrevious.classList.remove('hidden');

        btnSubmit.style.display = 'inline-flex';
        btnSubmit.classList.remove('hidden');
    }

    console.log('✅ UPDATE_BUTTONS: Complete');
}


function updateSummary() {
    console.log('📝 SUMMARY: Updating summary card with asset details...');
    if (selectedAsset) {
        const elAsset = document.getElementById('summary-asset');
        const elCode = document.getElementById('summary-code');
        const elType = document.getElementById('summary-type');

        if (elAsset) elAsset.textContent = selectedAsset.name;
        if (elCode) elCode.textContent = selectedAsset.code;
        if (elType) elType.textContent = selectedAsset.type;

        console.log('✅ SUMMARY: Updated asset details', { name: selectedAsset.name, code: selectedAsset.code });
    } else {
        console.warn('⚠️ SUMMARY: No selectedAsset found!');
    }
}

function submitMaintenance() {
    alert('Funcionalidad de guardado pendiente de implementación completa');
    closeRegisterModal();
}

function closeRegisterModal() {
    const modal = document.getElementById('modalRegisterContainer');
    if (modal) {
        modal.classList.add('hidden');
    }
}
