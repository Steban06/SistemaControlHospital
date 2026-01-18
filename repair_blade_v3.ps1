
$path = "c:\xampp\htdocs\SistemaControlHospital\projectLaravel\resources\views\bienes-nacionales.blade.php"
$lines = Get-Content $path

# Find start of stack
$startIndex = -1
for ($i=0; $i -lt $lines.Count; $i++) {
    if ($lines[$i] -match "@push\('modals'\)") {
        $startIndex = $i
        break
    }
}

if ($startIndex -eq -1) {
    Write-Host "Start not found"
    exit
}

# Find end of stack (last @endpush)
# We know the duplicated block goes to the end, so we search backwards or just find the last execution.
# Actually, the file ends with @endpush then @endsection.
$endIndex = $lines.Count - 2 # Assuming it's near the end

# Construct new content
# 1. Everything before start
$newContent = $lines[0..($startIndex-1)]

# 2. The Clean Block
$cleanBlock = @"
@push('modals')
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
@endpush
"@

# 3. Everything after the *old* block.
# Since the old block went to the end (except @endsection), we just append @endsection.
$newContent += $cleanBlock
$newContent += "@endsection"

Set-Content -Path $path -Value $newContent -Encoding UTF8
Write-Host "File repaired and deduplicated."
