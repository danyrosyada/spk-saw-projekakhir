<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @yield('css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg">

            </div>
            <!-- navbar -->
            @include('partials.navbar')

            <!-- sidebar -->
            @include('partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>

            <footer class="main-footer">
                @include('partials.footer')
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    @include('partials.script')
    @yield('js')
    <!-- Page Specific JS File -->
</body>

</html>