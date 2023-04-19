@include('admin.general.header')
    <body class="sb-nav-fixed">
@include('admin.general.navbar')
        <div id="layoutSidenav">
@include('admin.general.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>

                    </div>
                </main>
@include('admin.general.footer')
            </div>
        </div>
 @include('admin.general.scripts')
    </body>
</html>
