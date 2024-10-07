<x-guest>
    <div class="flex items-center justify-center w-full h-full overflow-hidden">
        <form method="POST" action="/login" class="flex flex-col p-4 bg-gray-100 rounded-lg shadow-lg w-96">
            @csrf
            <div class="mb-2">
                <label for="email" class="block text-sm font-medium">Your email</label>
                <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5" >
            </div>
            <div class="mb-2">
                <label for="password" class="block text-sm font-medium ">Your password</label>
                <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg block w-full p-2.5 " >
            </div>
            <button type="submit" class="w-full text-white bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-4">Login</button>
            {{-- <button type="submit" class="w-full text-indigo-500 bg-white font-medium rounded-lg border border-indigo-500 text-sm px-5 py-2.5 text-center mt-4">Register</button> --}}
            <div class="flex justify-end">
                <a href="/register" class="underline">Register</a>
            </div>
        </form>
    </div>
</x-guest>