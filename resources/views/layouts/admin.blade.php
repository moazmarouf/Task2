@include('dashboard.includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
@include('dashboard.includes.navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('dashboard.includes.sidebar')
<!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->
@include('dashboard.includes.footer')
