<div class="h-24 w-full px-12 py-6 flex justify-between items-center bg-gray-100 shadow-md">
    <div>
        <a href="/">Simpenan</a>
    </div>
    <div class="flex items-center">
        {{-- @dump(App\Models\User::all()) --}}
        {{auth()->user()->name}}
        <form action="/logout" method="POST" class="h-fit w-fit">
            @csrf
            <button type="submit" class="bg-white border border-red-500 text-red-500 rounded-md px-2 py-1">Logout</button>
        </form>
    </div>
</div>