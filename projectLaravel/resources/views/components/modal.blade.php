<div class="modal-overlay" id="{{ $id }}">
    <div class="modal-container">
        <div class="modal-header">
            <h2>
                @if(isset($icon))
                    <i class="fa-solid fa-{{ $icon }}"></i>
                @endif
                {{ $title ?? '' }}
            </h2>
            <button class="modal-close" data-modal-close aria-label="Cerrar modal">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
            <button type="button" class="modal-btn modal-btn-secondary" data-modal-cancel>
                <i class="fa-solid fa-times"></i>
                {{ $cancelText ?? 'Cancelar' }}
            </button>
            <button type="submit" class="modal-btn modal-btn-primary" id="{{ $saveBtnId ?? 'modalSaveBtn' }}" form="{{ $formId ?? '' }}">
                <i class="fa-solid fa-save"></i>
                {{ $saveText ?? 'Guardar' }}
            </button>
        </div>
    </div>
</div>