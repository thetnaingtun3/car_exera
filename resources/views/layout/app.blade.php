@include('layout.header')

<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layout.navbar')
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->

        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('layout.leftside')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">

                    @yield('content')
                </div>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('layout.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>


    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

@include('layout.script')
