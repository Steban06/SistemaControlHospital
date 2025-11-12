<div class="barra-lateral">
        <div class="logo-details">
            <img src="./Elemetos/img/virgen en blanco.png" alt="imgVirgen">
            
            <span class="logo_name">Sistema de Mantenimiento</span>
        </div>

        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class="fa-solid fa-border-all"></i>
                    <span class="link_name">Inicio</span>
                </a>
                <!-- <span class="tooltip">Inicio</span> -->
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Inicio</a></li>
                </ul>

            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class="fa-solid fa-file"></i>
                        <span class="link_name">seccion 2</span>
                    </a>
                    <!--Icono para mostrar mas opciones-->
                    <i class="fa-solid fa-chevron-down arrow"></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">subseccion 1</a></li>
                    <li><a href="#">subseccion 2</a></li>
                    <li><a href="#">subseccion 3</a></li>
                </ul>
            </li>
        </ul>
        <div class="profile-details">
            <div class="profile-content">
                <i class="fa-solid fa-circle-user"></i>
            </div>
            <div class="name-job">
                <div class="name">Nombre Apellido</div>
                <div class="job">Cargo</div>
            </div>
            <i class="fa-solid fa-arrow-right-from-bracket" id="log-out" title="Cerrar sesión"></i>
        </div>
    </div>

    <section class="home-section">
        <div class="home-content">
            <i class="fa-solid fa-bars bx-menu"></i>
            <span class="text">Sistema de Control</span>
        </div>
    </section>

    <script>
        let arrow = document.querySelectorAll(".arrow");


        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e) => {
                let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".barra-lateral");
        let sidebarBtn = document.querySelector(".bx-menu");
        
        sidebarBtn.addEventListener("click", () => {
            // console.log(sidebarBtn);
            sidebar.classList.toggle("close");
        });
    </script>