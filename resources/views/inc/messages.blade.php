{{--@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div style="text-align: center" class="alert alert-danger animated fadeInUp">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endforeach
@endif--}}

{{--
@if(count($errors) > 0)
        <div style="text-align: center" class="alert alert-danger animated fadeInUp">
            Check Error
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
@endif
--}}



@if(session('success'))
    <div style="text-align: center" class="alert alert-success animated fadeInUp">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if(session('error'))
    <div style="text-align: center" class="alert alert-danger alert-dismissible fade show">
        {{session('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


<script>
    const alertHTML = '<div class="alert">Alert!!!</div>';
    document.body.insertAdjacentHTML('beforeend', alertHTML);
    setTimeout(() => document.querySelector('.alert').classList.add('hide'), 4000);
</script>


