@include('admin.general.header')
<body class="sb-nav-fixed">
@include('admin.general.navbar')
<div id="layoutSidenav">
    @include('admin.general.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Election Results</h1>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Topic</th>
                        <th scope="col"></th>
                        <th scope="col">Result</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($elecs as $e)
                        <tr>
                            <td>{{$e->election_topic}}</td>
                            <td>
                                <a href="{{url("calcResult/$e->id")}}" class="btn btn-danger btn-icon-split">Calculate Result</a>
                            </td>
                            <td>{{$e->whoWon}}</td>
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
