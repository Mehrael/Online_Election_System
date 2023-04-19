@include('admin.general.header')
<body class="sb-nav-fixed">
@include('admin.general.navbar')
<div id="layoutSidenav">
    @include('admin.general.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">View Candidates</h1>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Description</th>
                        <th scope="col">Photo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($cans as $user)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->description}}</td>
                            <td><div class="flex-shrink-0">
                                    <img class="img-fluid rounded" src="{{ $user->photo }}"   style="height: 100px;width:100px">
                                </div></td>
                        </tr>
                        @php($i++)
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
        @include('admin.general.footer')
    </div>
</div>
@include('admin.general.scripts')
</body>
</html>
