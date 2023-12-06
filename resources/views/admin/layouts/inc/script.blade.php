
<!-- General JS Scripts -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
<!-- JS Libraries -->
<script src="{{asset('assets/bundles/jquery-steps/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/bundles/summernote/summernote-bs4.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/bundles/apexcharts/apexcharts.min.js')}}"></script>
<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/datatables.js')}}"></script>
<script src="{{asset('assets/js/page/index.js')}}"></script>
<script src="{{asset('assets/js/page/form-wizard.js')}}"></script>
<script src="{{asset('assets/bundles/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/bundles/codemirror/lib/codemirror.js')}}"></script>
<script src="{{asset('assets/bundles/codemirror/mode/javascript/javascript.js')}}"></script>
<script src="{{asset('assets/bundles/jquery-selectric/jquery.selectric.min.js')}}"></script>
<!-- Admin JS File -->
<script src="{{url('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
<script src="{{asset('assets/bundles/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/page/toastr.js')}}"></script>
<script src="{{url('assets/js/page/toastr.js')}}"></script>

<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/page/ckeditor.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr" style="width: 8px; z-index: 892; cursor: grab; position: fixed; top: 0px; left: 242px; height: 303px; touch-action: none; opacity: 0; display: block;">
    <div class="nicescroll-cursors" style="position: relative; top: 0px; float: right; width: 6px; height: 69px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; touch-action: none;"></div>
</div>
<div id="ascrail2002-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 8px; z-index: 892; top: 295.333px; left: 0px; position: fixed; display: none; width: 242px; opacity: 0;">
    <div class="nicescroll-cursors" style="position: absolute; top: 0px; height: 6px; width: 250px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;"></div>
</div>
@if(Session::has('success'))
    <script>
        iziToast.success({
            title: 'success',
            message: '<?php echo Session::get('success'); ?>',
            position: 'topRight'
        });
    </script>

@endif

@if(Session::has('error'))
    <script>
        iziToast.error({
            title: 'error',
            message: '<?php echo Session::get('error'); ?>',
            position: 'topRight'
        });
    </script>

@endif
