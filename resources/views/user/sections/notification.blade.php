{{-- Notification Components Start Here --}}
<div x-data="{ shownotification : true }" >
    @if(session()->has('success'))
    <div x-data="{ shownotification : true }" x-init="setTimeout(() => shownotification = false, 4000)">
        <x-success-notify :message="session()->get('success')"/>
    </div>
    @elseif(session()->has('error'))
    <div x-data="{ shownotification : true }" x-init="setTimeout(() => shownotification = false, 4000)">
        <x-error-notify :message="session()->get('error')"/>
    </div>
    @endif
</div>
{{-- Notification component Ends Here --}}