<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title>@yield('title', 'Page Title') | {{ config('app.name', 'SmartChoice') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.11.5/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="{{ route('app.index') }}" class="brand-link">
                    <img src="{{ asset('asset/new-age/img/AdminLTELogo.webp') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ config('app.name', 'SmartChoice') }}</span>
                </a>
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('app.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>App</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('app.product.list') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('app.product.add') }}" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Add Product</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <main class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <h1>@yield('title', 'Page Title')</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    @yield('content')
                </section>
            </main>
            <footer class="main-footer">
                <span>2025 © {{ config('app.name', 'SmartChoice') }}.</span>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.11.5/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.19.1/dist/sweetalert2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
        @stack('script')
    </body>
</html>