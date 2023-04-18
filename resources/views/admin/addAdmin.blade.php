@include('admin.general.header')
<body class="sb-nav-fixed">
@include('admin.general.navbar')
<div id="layoutSidenav">
    @include('admin.general.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add Admin</h1>
                <br>
                <div class="row">
                    <div class="col-xl-2\3 col-lg-3">
                        <form method="POST" action="{{ url('addAdmin') }}" enctype="multipart/form-data"
                              style="margin: auto; padding: 20px;border: 1px solid #ccc; border-radius: 5px; background-color: #f2f2f2;">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="username">
                                @if($show_username)
                                    <small id="emailHelp" class="form-text text-muted">The username must be
                                        unique.</small>
                                @endif
                                @if(!$show_username)
                                    <br>
                                <div class="alert alert-danger" role="alert" style="text-align: center">
                                    Username <strong>MUST</strong> be unique!!
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword2"
                                       name="confirmPassword">
                            </div>
                            <br>
                            @if(!$show_password)
                            <div class="alert alert-danger" role="alert" style="text-align: center">
                                Password doesn't match Confirm Password
                            </div>
                            @endif
                            <input type="submit" value="Add" class="btn btn-success btn-icon-split">
                        </form>
                    </div>
                </div>
            </div>
        </main>
        @include('admin.general.footer')
    </div>
</div>
@include('admin.general.scripts')
</body>
</html>
