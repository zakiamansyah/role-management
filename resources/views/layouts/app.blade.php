<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            padding-top: 56px;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar Navigation -->
        @auth
            <ul class="nav flex-column bg-light p-3 shadow-sm rounded-end" style="min-height: 100vh; width: 250px;">
                @php
                    $menus = collect();
                    $user = auth()->user();

                    // Ensure $user and $user->role are valid objects before accessing them
                    if ($user && $user->role && is_iterable($user->role)) {
                        foreach ($user->role as $role) {
                            if ($role->menus && is_iterable($role->menus)) {
                                foreach ($role->menus as $menu) {
                                    $menus->push($menu);
                                }
                            }
                        }
                        $menus = $menus->unique('id');
                    }
                    dd($user);    
                @endphp

                @forelse($menus as $menu)
                    <li class="nav-item mb-2">
                        <a class="nav-link text-dark fw-bold d-flex align-items-center" href="{{ route($menu->route) }}">
                            <i class="bi bi-chevron-right me-2"></i>
                            {{ $menu->name }}
                        </a>
                    </li>
                @empty
                    <li class="nav-item text-muted">No menus available</li>
                @endforelse
            </ul>
        @endauth

        <!-- Main Content -->
        <main class="container mt-4 flex-grow-1">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Role Management. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
