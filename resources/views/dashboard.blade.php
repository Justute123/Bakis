<?php
session_start();
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Admin Panel</title>

    <!-- Vendor css files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/adminlte.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/admin') }}" class="brand-link">

            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="#" class="d-block">
                        <p>Welcome, {{Auth::user()->name}}!</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">

                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{ url('/admin/Naudotojai') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/Roles') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/colors') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Colors</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/products') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/brands') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Brands</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/types') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Types</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/sizes') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Sizes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/reviews') }}" class="nav-link">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>Reviews</p>
                        </a>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('title')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0
        </div>
        <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->

</div>
<!-- ./wrapper -->

<!-- Vendor javascript files-->
<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- admin template Main JS File -->
<script src="/assets/js/adminlte.min.js"></script>
@yield('scripts')
</body>
</html>
