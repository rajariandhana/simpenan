<nav class="h-24 w-full px-12 py-6 flex justify-between items-center bg-gray-100 shadow-md"
x-data="{accOpt:false}">
    <div class="flex flex-col w-full h-full">
        <a href="/" class="text-xl font-semibold">SIMPENAN</a>
        {{-- <span class="text-xs">Sistem Informasi Media Privasi</span> --}}
        <span class="text-xs">Sistem Informasi Media Penting Aman</span>
    </div>
    <div class="flex items-center w-full justify-end h-full">
        {{-- @dump(App\Models\User::all()) --}}
        {{-- <a href="/account" class="hover:underline">{{auth()->user()->name}}</a> --}}
        <button @click="accOpt=!accOpt" @click.oustide="accOpt=false">
            <span>{{Auth::user()->name}}</span>
            <img src="" alt="">
        </button>
        <div x-show="accOpt" class="fixed flex flex-col justify-center p-2 h-fit mt-32 font-sans text-center bg-gray-200 rounded-lg shadow-md text-zinc-500 text-md gap-y-2">
            <a href="/account" class="w-24 py-1 text-white bg-indigo-500 rounded-lg">Account</a>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button type="submit" class="w-24 py-1 text-white rounded-lg bg-rose-500">Logout</a>
            </form>
            {{-- <a href="" class="w-24 py-1 text-white rounded-lg bg-rose-500">Logout</a> --}}
        </div>
    </div>
</nav>
