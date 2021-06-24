<script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/backend/js/lazyload.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/backend/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('public/backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('public/backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/backend/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('public/backend/js/message.js')}}"></script>

<!-- PAGE SCRIPTS -->
<!-- <script src="{{asset('public/dist/js/pages/dashboard2.js')}}"></script> -->
<script>
    $(document).ready(function() {
        $(".mt-2 li a.nav-link").click(function (e) {
        if(!$(this).hasClass('active'))
        {
            $(".mt-2 li a.nav-link").removeClass("active");
            $(this).addClass("active");   
        }
        });
    });
</script>
<!-- <script>
    $('.nav-link').click(function (event) {
    // Avoid the link click from loading a new page
    event.preventDefault();
    // Load the content from the link's href attribute
    $('.wrapper').load($(this).attr('href'));
});
</script> -->

@yield('after-scripts')
