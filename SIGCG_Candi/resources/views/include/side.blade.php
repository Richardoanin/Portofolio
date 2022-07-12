<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

        <aside class="left-sidebar" data-sidebarbg="skin6" style="position: fixed">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Hasil</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/pernyataan/{{auth()->user()->id}}" aria-expanded="false"><i
                                    class="mdi mdi-clipboard-text"></i><span class="hide-menu">Pernyataan</span></a></li>
                        @if (Auth::user()->role == 'Administrator')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/survey" aria-expanded="false"><i class="mdi mdi-book"></i><span
                                    class="hide-menu">Survey</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/feedback" aria-expanded="false"><i class="mdi mdi-thumbs-up-down"></i><span
                                    class="hide-menu">Feedback</span></a></li>
                        @else
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            href="/survey/users" aria-expanded="false"><i class="mdi mdi-book"></i><span
                                class="hide-menu">Survey</span></a></li>
                        @endif
                        @if (Auth::user()->role == 'Administrator')
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/materi" aria-expanded="false"><i class="mdi mdi-file-document"></i><span
                                    class="hide-menu">Materi</span></a></li>
                        @else
                        @endif
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="/partisipan" aria-expanded="false"><i class="mdi mdi-account-plus"></i><span
                                    class="hide-menu">Partisipan</span></a></li>
                    </ul>
                </nav>
            </div>
        </aside>
    </body>