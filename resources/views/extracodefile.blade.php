{{-- This code is for Notify  --}}

@section('bodyExtra')
<link href="{{asset('assets/toastify/toastify.css')}}" rel="stylesheet">
<script src="{{asset('assets/toastify/toastify.js')}}"></script>
<script>
$(document).ready(function(){
    Toastify({
        text: "This is toast in bottom right",
        duration: 3000,
        close:true,
        gravity:"top",
        position: "center",
        backgroundColor: "#4fbe87",
    }).showToast();
});

</script>
@endsection

