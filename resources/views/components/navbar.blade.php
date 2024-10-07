<div class="h-24 w-full px-12 py-6 flex justify-between items-center bg-gray-100 shadow-md">
    <div class="flex flex-col w-full h-full">
        <a href="/" class="text-xl font-semibold">SIMPENAN</a>
        {{-- <span class="text-xs">Sistem Informasi Media Privasi</span> --}}
        <span class="text-xs">Sistem Informasi Media Penting Aman</span>
    </div>
    <div class="flex items-center w-full justify-end h-full bg-blue-200">
        {{-- @dump(App\Models\User::all()) --}}
        <a href="/account" class="hover:underline">{{auth()->user()->name}}</a>
        <div class="h-full flex flex-col items-center justify-center bg-red-200">
            <form action="/logout" method="POST" class="">
                @csrf
                <button type="submit" class=" text-red-500 bg-gray-600">Logout</button>
            </form>
        </div>
    </div>
</div>
