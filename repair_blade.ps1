
$path = "c:\xampp\htdocs\SistemaControlHospital\projectLaravel\resources\views\bienes-nacionales.blade.php"
$content = Get-Content $path -Raw

# 1. Clean the end of the file
# Remove the bad include line if it exists (captured from previous observations)
$cleanContent = $content -replace "@endsection@include\('layouts.partials.modal-view-bien'\).*", "@endsection"

# 2. Also remove any double @endsection if I accidentally created one
$cleanContent = $cleanContent -replace "@endsection\s*@endsection", "@endsection"

# 3. Define the correct block to insert BEFORE the last @endsection
$newBlock = @"

    <!-- Modal Ver Ficha -->
    @include('layouts.partials.modal-view-bien')

    <script>
        function openViewModal(bien) {
            if (!bien) return;
            
            // Helper to safely set text
            const setText = (id, val) => {
                const el = document.getElementById(id);
                if (el) el.textContent = val;
            };

            setText('modal-bn-id', bien.numero_bn);
            setText('modal-bn-nombre', bien.nombre);
            setText('modal-bn-desc', (bien.marca || '') + ' ' + (bien.modelo || ''));
            setText('modal-bn-serial', bien.serial || 'S/N');
            
            // Relations
            setText('modal-bn-area', bien.area ? bien.area.descripcion : 'N/A');
            setText('modal-bn-categoria', bien.categoria ? bien.categoria.tipo : 'N/A');

            // Date
            if (bien.created_at) {
                const date = new Date(bien.created_at);
                setText('modal-bn-fecha', date.toLocaleDateString('es-ES', { day: 'numeric', month: 'short', year: 'numeric' }));
            }

            // Status Styling
            const estadoEl = document.getElementById('modal-bn-estado');
            const badge = document.getElementById('modal-bn-estado-badge');
            
            if (estadoEl && badge) {
                estadoEl.textContent = bien.estado;
                const dot = badge.querySelector('span');
                
                let badgeClass = 'inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-medium';
                let dotClass = 'w-1.5 h-1.5 rounded-full mr-1.5';
                
                switch(bien.estado) {
                    case 'Operativo':
                        badgeClass += ' bg-emerald-100 text-emerald-700';
                        dotClass += ' bg-emerald-500';
                        break;
                    case 'Dañado': 
                    case 'Fuera de Servicio':
                        badgeClass += ' bg-red-100 text-red-700';
                        dotClass += ' bg-red-500';
                        break;
                    case 'En reparación':
                        badgeClass += ' bg-amber-100 text-amber-700';
                        dotClass += ' bg-amber-500';
                        break;
                    default: 
                        badgeClass += ' bg-gray-100 text-gray-700';
                        dotClass += ' bg-gray-500';
                }
                
                badge.className = badgeClass;
                if (dot) dot.className = dotClass;
            }

            // QR Code
            const qrEl = document.getElementById('modal-qr-code');
            if (qrEl && bien.numero_bn) {
                qrEl.src = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + bien.numero_bn;
            }

            // Show Overlay
            const overlay = document.getElementById('viewModalOverlay');
            if (overlay) overlay.classList.remove('hidden');
        }

        function closeViewModal() {
            const overlay = document.getElementById('viewModalOverlay');
            if (overlay) overlay.classList.add('hidden');
        }
    </script>
@endsection
"@

# 4. Replace the last @endsection with the new block
# We verify if the modal include is ALREADY there inside to avoid duplication
if ($cleanContent -notmatch "function openViewModal") {
    $cleanContent = $cleanContent -replace "@endsection", $newBlock
}

Set-Content -Path $path -Value $cleanContent -Encoding UTF8
Write-Host "File repaired."
