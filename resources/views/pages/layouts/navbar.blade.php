<nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <ul class="navbar-nav d-flex align-items-center  justify-content-end">

                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link dropdown-toggle text-body font-weight-bold px-0" href="#" id="userDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="material-symbols-rounded fs-4">account_circle</i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                        <li class="dropdown-header text-center">
                            {{ Auth::user()->name ?? 'Invitado' }}
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                       
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger d-flex align-items-center">
                                    <i class="material-symbols-rounded me-2 ">logout</i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

                </ul>
        </div>
    </div>
</nav>
