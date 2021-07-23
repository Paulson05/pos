
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
     <head>
  @include('backend.template.partials.head')
    </head>

    <body>
      <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="../assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
               @include('backend.template.partials.sidenavbar')
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            @include('backend.template.partials.navbar')
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
{{--                    @include('backend.template.partials.statisctics')--}}
                   @yield('body')

                </div>
            </div>
       @include('backend.template.partials.footer')
                                </div>
                            </div>

</body>
<!--   Core JS Files   -->
@include('backend.template.partials.script')
<!-- End Facebook Pixel Code -->


<!-- Mirrored from demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/default.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 May 2021 20:19:51 GMT -->
</html>
