<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();

    $(function() {
        $('[data-toggle="popover"]').popover()
    })

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
