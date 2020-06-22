@if ($message = Session::get('success'))
    <div  style="text-align: center" class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong style="text-align: center">{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('error'))
    <div  style="text-align: center" class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong style="text-align: center">{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div  style="text-align: center" class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong style="text-align: center">{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('info'))
    <div style="text-align: center" class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong style="text-align: center">{{ $message }}</strong>
    </div>
@endif

@if ($errors->any())
    <div style="text-align: center" class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
    </div>
@endif


{{--<script>
    const alertHTML = '<div class="alert">Alert!!!</div>';
    document.body.insertAdjacentHTML('beforeend', alertHTML);
    setTimeout(() => document.querySelector('.alert').classList.add('hide'), 4000);
</script>--}}


