@section('sidebar')
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        Admins
                        <div class="sb-sidenav-collapse-arrow">
                            <svg class="svg-inline--fa fa-angle-down" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 384 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path>
                            </svg>
                        </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('addNewAdmin')}}">Add New Admin</a>
                            <a class="nav-link" href="{{url('viewAdmins')}}">View Admins</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapses"
                       aria-expanded="false" aria-controls="collapses">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user-alt"></i>
                        </div>
                        Candidates
                        <div class="sb-sidenav-collapse-arrow">
                            <svg class="svg-inline--fa fa-angle-down" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 384 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path>
                            </svg>
                        </div>
                    </a>
                    <div class="collapse" id="collapses" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('addNewCandidate')}}">Add New Candidate</a>
                            <a class="nav-link" href="{{url('viewCandidate')}}">View Candidates</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                       aria-expanded="false" aria-controls="pagesCollapseAuth">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        Elections
                        <div class="sb-sidenav-collapse-arrow">
                            <svg class="svg-inline--fa fa-angle-down" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 384 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path>
                            </svg>
                        </div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{url('addNewElection')}}">Add New Election</a>
                            <a class="nav-link" href="{{url('viewElections')}}">View Elections</a>
                        </nav>
                    </div>
                    <a class="nav-link" href="{{url('calcResult')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-calculator"></i></div>
                        Calculate Results
                    </a>
                    <a class="nav-link" href="{{url('logout')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Logout
                    </a>
                </div>
            </div>

        </nav>
    </div>

@show
