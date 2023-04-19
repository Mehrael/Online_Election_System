@include('admin.general.header')
<body class="sb-nav-fixed">
@include('admin.general.navbar')
<div id="layoutSidenav">
    @include('admin.general.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Elections</h1>
                <br>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Topic</th>
                        <th scope="col">Number of candidates</th>
                        <th scope="col">Still Available?</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i = 1)
                    @foreach($elections as $e)
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$e->topic}}</td>
                            <td>{{$e->numOfCandidates}}</td>
                            <td>
                                @if($e->stillAvailable)
                                    Yes
                                @else
                                    No
                                @endif</td>
                            <td>
                                <a href="{{url("viewElection/$e->id")}}" class="btn btn-success btn-icon-split">View Election</a>
                            </td>
                            <td>
                                <a href="{{url("endElection/$e->id")}}" class="btn btn-danger btn-icon-split">End Election</a>
                            </td>
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
