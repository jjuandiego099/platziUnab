 <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
     id="sidenav-main">
     <div class="sidenav-header">
         <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
             aria-hidden="true" id="iconSidenav"></i>
         <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
             target="_blank">
             <img style="max-height: fit-content!important;"
                 src="{{ asset('assets/img/logos/LogoUNAB/unab_logo.png') }}" alt="Ecommerce UNAB"
                 class="img-fluid border-radius-lg shadow-sm">

         </a>
     </div>
     <hr class="horizontal dark mt-0 mb-2">
     <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link {{ Request::is('home*')? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                     href="{{ route('home') }}">
                     <i class="material-symbols-rounded opacity-5">dashboard</i>
                     <span class="nav-link-text ms-1">Dashboard</span>
                 </a>
             </li>
            @can('categorias')
                 <li class="nav-item">
                 <a class="nav-link {{ Request::is('categorias*')  ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                     href="{{ route('categorias.table') }}">
                     <i class="material-symbols-rounded opacity-5">label</i>
                     <span class="nav-link-text ms-1">Categorias</span>
                 </a>
             </li>
             @endcan
             
              
             
             <li class="nav-item">

                 <a class="nav-link {{ Request::is('cursos*')  ? 'active bg-gradient-dark text-white' : 'text-dark' }}"
                     href="{{ route('categorias.table') }}" data-bs-toggle="collapse"
                     href="#submenuCursos" role="button" aria-expanded="false" aria-controls="submenuCursos">
                     <i class="material-symbols-rounded opacity-5 me-2">folder</i>
                     <span class="nav-link-text flexgrow-1">Mis Cursos</span>
                     
                 </a>

               
             </li>
              <li class="nav-item">

                 <a class="nav-link text-dark d-flex align-items-center collapsed" data-bs-toggle="collapse"
                     href="#submenuCertificados" role="button" aria-expanded="false" aria-controls="submenuCertificados">
                     <i class="material-symbols-rounded opacity-5 me-2">verified</i>
                     <span class="nav-link-text flexgrow-1">Certificados</span>
                    
                 </a>

                 <!-- Submenú -->
                
             </li>
             <li class="nav-item">
                 <a class="nav-link text-dark" href="../pages/tables.html">
                     <i class="material-symbols-rounded opacity-5">description</i>
                     <span class="nav-link-text ms-1">Reseñas</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link text-dark" href="../pages/tables.html">
                     <i class="material-symbols-rounded opacity-5">info</i>
                     <span class="nav-link-text ms-1">Informacion</span>
                 </a>
             </li>

            




         </ul>
     </div>
     <div class="sidenav-footer position-absolute w-100 bottom-0 ">
         <div class="mx-3">

             <a class="btn bg-gradient-dark w-100" href="#" type="button">Mi Perfil</a>
         </div>
     </div>
 </aside>
