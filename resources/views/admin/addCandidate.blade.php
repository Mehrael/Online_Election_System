@include('admin.general.header')
<body class="sb-nav-fixed">
@include('admin.general.navbar')
<div id="layoutSidenav">
    @include('admin.general.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add New Candidate</h1>
                <br>
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <form method="POST" action="{{ url('addCandidate') }}" enctype="multipart/form-data"
                              style="margin: auto; padding: 20px;border: 1px solid #ccc; border-radius: 5px; background-color: #f2f2f2;">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Name</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="name"
                                           required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault02">Phone</label>
                                    <input type="text" class="form-control" id="validationDefault02" name="phone"
                                           required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault03">Address</label>
                                    <input type="text" class="form-control" id="validationDefault03" name="address"
                                           required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="custom-file mb-3">
                                        <label class="custom-file-label" for="validatedCustomFile">Photo</label>
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="photo" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationTextarea">Description</label>
                                    <textarea  class="form-control" id="validationTextarea" name="desc" required>
                                    </textarea>
                                </div>
                            </div>


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
