@include('admin.general.header')
<body class="sb-nav-fixed">
@include('admin.general.navbar')
<div id="layoutSidenav">
    @include('admin.general.sidebar')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add New Election</h1>
                <br>
                <div class="row">
                    <div class="col-xl-3 col-lg-3">
                        <form method="POST" action="{{ url('addElection') }}" enctype="multipart/form-data"
                              style="margin: auto; padding: 20px;border: 1px solid #ccc; border-radius: 5px; background-color: #f2f2f2;">
                            @csrf
                            <input type="hidden" name="myVariable" id="myVariableInput" value="1">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault01">Topic</label>
                                    <input type="text" class="form-control" id="validationDefault01" name="topic"
                                           required>
                                </div>
                                <div class="mb-3">
                                    <label>Candidates</label>
                                    <div id="selects" class="select-group">
                                        <select class="form-control" name="select-1" required>
                                            <option value="0">Choose...</option>
                                            @foreach($cans as $c)
                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <button type="button" class="btn btn-primary btn-icon-split add-select">Add
                                            Candidate
                                        </button>
                                        <br>
                                    </div>

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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectGroup = document.querySelector('.select-group');
        const addSelectButton = document.querySelector('.add-select');
        const maxSelects = {{  $numOfCans  }};
        let numSelects = 1;

        addSelectButton.addEventListener('click', function () {
            if (numSelects < maxSelects) {
                const newSelectGroup = selectGroup.cloneNode(true);
                const newSelect = newSelectGroup.querySelector('select');

                numSelects++;
                newSelect.name = 'select-' + numSelects;
                newSelect.selectedIndex = 0;

                const addButton = newSelectGroup.querySelector('.add-select');
                addButton.addEventListener('click', function () {
                    addSelectButton.click();
                });

                const selects = document.querySelector('#selects');
                selects.appendChild(newSelectGroup);

                const myVariableInput = document.querySelector('#myVariableInput');
                myVariableInput.value = numSelects;
            }
        });
    });
</script>

</body>
</html>
