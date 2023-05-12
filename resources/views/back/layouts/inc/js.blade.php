<!--   Core JS Files   -->
<script src="/jQuery/jquery-3.6.0.min.js"></script>
<script src="/argon/assets/js/core/popper.min.js"></script>
<script src="/argon/assets/js/core/bootstrap.min.js"></script>
<script src="/argon/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/argon/assets/js/plugins/smooth-scrollbar.min.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/argon/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

@stack('scripts')
