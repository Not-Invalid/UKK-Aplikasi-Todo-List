<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">

    {{-- Font Awesome Icons --}}
    <link rel="stylesheet" href="{{ asset('modules/font-awesome/css/all.min.css') }}">

    {{-- Sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('modules/sweetalert2/sweetalert2.min.js') }}">

    {{-- Custom styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    {{-- Poppins font --}}
    <link rel="stylesheet" href="{{ asset('assets/fonts/Poppins-Regular.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Poppins-Medium.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Poppins-SemiBold.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Poppins-Bold.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Poppins-ExtraBold.ttf') }}">
    @stack('css')
</head>

<body class="@yield('body-class')">

    <div class="custom">
        <div class="overlay"></div>

        {{-- Sidebar --}}
        <div class="sidebar">
            <div class="logo-details">
                <i class="fa-solid fa-rectangle-list"></i>
                <span class="logo_name">TaskMate</span>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="{{ route('dashboard') }}" class="{{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-grip"></i>
                        <span class="links_name">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks') }}" class="{{ request()->is('tasks') ? 'active' : '' }}">
                        <i class="fa-solid fa-clipboard-list"></i>
                        <span class="links_name">Tasks</span>
                    </a>
                </li>
            </ul>
        </div>

        {{-- Main Content --}}
        <main class="content home-section">
            <nav class="nav-layout">
                <div class="sidebar-button">
                    <i class='fas fa-bars sidebarBtn'></i>
                    <span class="dashboard"> Dashboard </span>
                </div>
            </nav>

            <div class="home-content px-4">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Bootstrap JS --}}
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- @vite(['resources/js/app.js']) --}}
    <script src="{{ asset('modules/jquery/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('modules/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if ("{{ session('success') }}") {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "success",
                    iconColor: "#ffffff",
                    background: "#a5dc86",
                    color: "#ffffff",
                    title: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }

            if ("{{ session('error') }}") {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    icon: "error",
                    iconColor: "#ffffff",
                    background: "#f27474",
                    color: "#ffffff",
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".sidebar-button i");

            sidebarBtn.onclick = function() {
                sidebar.classList.toggle("active");

                if (sidebar.classList.contains("active")) {
                    sidebarBtn.classList.remove("fa-bars");
                    sidebarBtn.classList.add("fa-bars-staggered");
                } else {
                    sidebarBtn.classList.remove("fa-bars-staggered");
                    sidebarBtn.classList.add("fa-bars");
                }
            };
        });
    </script>

    @stack('scripts')
</body>

</html>
