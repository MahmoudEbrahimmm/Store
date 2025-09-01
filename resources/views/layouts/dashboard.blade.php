<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title-url', ' Dashboard - لوحة التحكم ')</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link href="{{ asset('dashboard/css/styles.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Nav-bar left -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.categories.index') }}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.products.index') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard.roles.index') }}">Roles</a>
            </li>

                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <ul class="nav-item">
                        <a class="nav-link text-white d-inline-block px-0" rel="alternate"
                            hreflang="{{ $localeCode }}"
                            href="{{LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </ul>
                @endforeach

        </ul>

        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>

        <x-dashboard.notification-menu />

        <!-- Navbar right-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fa-xl"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-light dropdown-item">Logout</button>
                    </form>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a href="{{ route('dashboard.profile.edit') }}" class="sb-sidenav-menu-heading nav-link mt-3">
                            {{ Auth::user()->name ?? '' }}</a>
                        <!-- Start partials code nav -- sidebarMenu -->
                        @include('layouts.partials.nav')
                    </div>

                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Developed by:</div>
                    {{ env('APP_DEVLOPER') }}
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h3 class="mt-4 mb-3">@yield('title-page')</h3>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            @section('breadcrumb')
                                <li class="breadcrumb-item"><a href="#" class="nav-link active">Home</a></li>
                            @show
                        </ol>
                    </div>

                    {{-- Start Section Content --}}

                    @yield('content')

                    {{-- E--nd Section Content --}}

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Developed by: &copy; Mahmoud-Ebrahim 2023</div>
                    </div>
                </div>
            </footer>
        </div>


    </div>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('dashboard/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('dashboard/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('dashboard/js/datatables-simple-demo.js') }}"></script>
    <script>
        const userID = "{{ Auth::id() }}";
    </script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    @stack('scripts')
</body>

</html>
