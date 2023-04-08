@include('layouts.authHeader')
@yield('content')
@include('layouts.authFooter')
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
    @if($errors->any())
    @foreach ($errors->all() as $error)
    toastr.warning("{{ $error }}");
    @endforeach
    @endif
</script>
