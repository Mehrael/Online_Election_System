@include('admin.general.header')
<body class="sb-nav-fixed">
@include('admin.general.navbar')
<div id="layoutSidenav">
    @include('admin.general.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">{{$election[0]->election_topic}}</h1>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Candidate</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($election as $e)
                        <tr>
                            <td></td>
                            <td>
                                <img class="img-fluid rounded" src="{{ $e->photo }}" style="height: 100px;width:100px" alt="">
                            </td>
                            <td>{{$e->candidate_name}}</td>
                            <td>{{$e->phone}}</td>
                            <td>{{$e->address}}</td>
                            <td>{{$e->description}}</td>
                        </tr>

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
