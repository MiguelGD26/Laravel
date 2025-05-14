<aside class="app-sidebar text-white shadow d-flex flex-column" style="min-height: 100vh; background-color: #800000;">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand ">
        <a href="../index.html" class="d-flex align-items-center text-white text-decoration-none">
            <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="Logo" class="me-2" style="height: 30px;">
            <span class="fw-bold">AdminLTE 4</span>
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-wrapper flex-grow-1 px-2 pt-2">
        <nav class="nav flex-column">
            <!-- Seguridad -->
            <div class="nav-item">
                <a class="nav-link text-white d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse ps-4" href="#seguridadMenu" role="button" aria-expanded="false"
                    aria-controls="seguridadMenu">
                    <span><i class="bi bi-shield-lock me-2"></i> Seguridad</span>
                    <i class="bi bi-chevron-down"></i>
                </a>
                <div class="ps-4" id="seguridadMenu">
                    <!-- Enlace para Usuarios -->
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('users.index') ? 'active-item' : 'text-white' }}">
                        <i class="bi bi-people me-2"></i>Usuarios
                    </a>

                    <!-- Enlace para Categorías -->
                    <a href="{{ route('categorias.index') }}"
                        class="nav-link {{ request()->routeIs('categorias.index') ? 'active-item' : 'text-white' }}">
                        <i class="bi bi-tags me-2"></i>Categorías
                    </a>

                    <!-- Enlace para Roles -->
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('roles.index') ? 'active-item' : 'text-white' }}">
                        <i class="bi bi-person-badge me-2"></i>Roles
                    </a>
                </div>
            </div>

            <!-- Otro Item -->
            <div class="nav-item mt-3">
                <a href="../generate/theme.html" class="nav-link text-white">
                    <i class="bi bi-palette me-2"></i> Theme Generate
                </a>
            </div>
        </nav>
    </div>
</aside>