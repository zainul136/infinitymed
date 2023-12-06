<!DOCTYPE html>
<html lang="en">
<!-- app.blade.php  28 Dec 2022 10:44:50 GMT -->
@include('admin.layouts.inc.head')
@section('style')
@show

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
    @include('admin.layouts.inc.navbar')
    @include('admin.layouts.inc.sidebar')
    <!-- Main Content -->
    @section('main-content')
    @show
    <!-- End Main Content -->
    @include('admin.layouts.inc.footer')
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

@include('admin.layouts.inc.script')
@section('script')
@show


</body>
</html>
