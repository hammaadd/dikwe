<script>
    @if(session()->get('success'))
   toastr.success("{{session()->get('success')}}");
   @elseif(session()->get('error'))
   toastr.error("{{session()->get('error')}}");
   @endif
</script>
