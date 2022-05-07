@if (session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" 
    x-show="show" class="fixed top-0 transform left-1/2 -translate-x-1/2
    bg-teal-400 text-white px-30 py-5">
    <p>
        {{ session('message') }}
    </p>
</div>
    
@endif