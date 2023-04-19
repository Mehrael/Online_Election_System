@include('member.general.header')
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    @include('member.general.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('member.general.navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Home</h1>

                </div>

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
                            <th scope="col">Vote</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($election as $e)
                            <tr>
                                <td></td>
                                <td>
                                    <img class="img-fluid rounded" src="{{ $e->photo }}"
                                         style="height: 100px;width:100px" alt="">
                                </td>
                                <td>{{$e->candidate_name}}</td>
                                <td>{{$e->phone}}</td>
                                <td>{{$e->address}}</td>
                                <td>{{$e->description}}</td>
                                <td>
                                    <a href="{{url("voteForCan/$e->id")}}?electionID={{$e->electionID}}" class="btn btn-primary btn-icon-split">
                                        <i class="fas fa-fw fa-check"></i> </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('member.general.footer')
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="">Logout</a>
            </div>
        </div>
    </div>
</div>

@include('member.general.scripts')
</body>

</html>
