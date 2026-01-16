<div class="barra-lateral">
    <div class="logo-details">
        <img src="{{ asset('images/svg/virgen-compact.svg') }}" alt="Logo Sistema">
        <span class="logo_name">Sistema de Mantenimiento</span>
    </div>

    <ul class="nav-links">
        <li>
            <a href="{{ url('/inicio') }}">
                <i class="fa-solid fa-border-all"></i>
                <span class="link_name">Inicio</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="{{ url('/inicio') }}">Inicio</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="{{ url('/bienes-nacionales') }}">
                    <i class="fa-solid fa-file"></i>
                    <span class="link_name">Bienes Nacionales</span>
                </a>
                <!--Icono para mostrar mas opciones-->
                <i class="fa-solid fa-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="{{ url('/bienes-nacionales') }}">Bienes Nacionales</a></li>
                <li><a href="#">Medicos</a></li>
                <li><a href="#">Mobiliarios</a></li>
                <li><a href="#">Tecnológico</a></li>
                <li><a href="#">Infraestructura</a></li>
            </ul>
        </li>
    </ul>
    
    <div class="profile-details">
        <div class="profile-content">
            <i class="fa-solid fa-circle-user"></i>
        </div>
        <div class="name-job">
            <div class="name">
                @auth
                    {{ Auth::user()->name ?? 'Usuario' }}
                @else
                    Invitado
                @endauth
            </div>
            <div class="job">
                @auth
                    {{ Auth::user()->email ?? 'Usuario' }}
                @else
                    No autenticado
                @endauth
            </div>
        </div>
        @auth
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="inline-block">
                    <i class="fa-solid fa-arrow-right-from-bracket" id="log-out" title="Cerrar sesión"></i>
                </button>
            </form>
        @else
            <a href="#">
                <i class="fa-solid fa-arrow-right-from-bracket" id="log-out" title="Iniciar sesión"></i>
            </a>
        @endauth
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Funcionalidad para mostrar/ocultar submenús
        let arrows = document.querySelectorAll(".arrow");
        
        arrows.forEach(function(arrow) {
            arrow.addEventListener("click", function(e) {
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        });

        // Funcionalidad para colapsar/expandir sidebar
        let sidebar = document.querySelector(".barra-lateral");
        let sidebarBtn = document.querySelector(".bx-menu");
        
        if (sidebarBtn) {
            sidebarBtn.addEventListener("click", function() {
                sidebar.classList.toggle("close");
            });
        }
    });
</script>
@endpush

