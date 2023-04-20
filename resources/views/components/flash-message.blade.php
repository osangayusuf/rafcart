@if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed border rounded-md top-1 left-1/2 transform -translate-x-1/2 bg-primary text-white px-4 py-3">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif