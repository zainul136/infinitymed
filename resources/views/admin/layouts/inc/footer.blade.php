<footer class="main-footer">
    <div class="footer-right">
        <a href="{{asset('/dashboard')}}">Infinity Me </a></a>
    </div>
    <div class="footer-right">
    </div>
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            iziToast.success({
                title: 'success',
                message: '<?php echo \Illuminate\Support\Facades\Session::get('success'); ?>',
                position: 'topRight'
            });
        </script>

    @endif

    @if(Session::has('error'))
        <script>
            iziToast.error({
                title: 'error',
                message: '<?php echo \Illuminate\Support\Facades\Session::get('error'); ?>',
                position: 'topRight'
            });
        </script>

    @endif
</footer>
