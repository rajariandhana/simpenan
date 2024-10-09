<x-layout>
    {{-- @guest
        <a href="/register">Register</a>
        <a href="/login">login</a>
        <a href="/">dashboard</a>
    @endguest
    @auth
        <x-navbar></x-navbar>
    @endauth --}}
    @if (session('success'))
        <div class="bg-green-200 border border-green-500 text-green-800 px-4 py-2 rounded-md shadow-md w-fit">
            {{ session('success') }}
            {{-- File uploaded successfully --}}
        </div>
    @endif
    {{-- <div class=""> --}}
    <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data"
        class="flex justify-between bg-white rounded-md shadow-md p-4 w-fit">
        @csrf
        <div class="flex items-center gap-x-4">
            <label for="file">Select File (PDF, Image, or Video)</label>
            <input type="file" name="file" class="" required>
        </div>
        <button type="submit" class="bg-indigo-500 px-4 py-2 rounded-md shadow-md text-white">Upload</button>
    </form>
    {{-- </div> --}}
    {{-- <div class="bg-white rounded-md shadow-md p-4 w-full"> --}}
        {{-- @dump(App\Models\File::get()) --}}
        @if ($files->isEmpty())
        <div class="bg-white border px-4 py-2 rounded-md shadow-md w-fit">
            No files have been uploaded!
        </div>
        @else
            {{-- <div class="relative overflow-x-auto bg-white rounded-md shadow-md p-4 w-full"> --}}
                <table class="text-sm text-left rtl:text-right text-gray-500 bg-white p-4 w-full rounded-md shadow-md">
                    <thead class="text-xs text-gray-700 uppercase border-b-2 border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                File name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Uploaded At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $file->file_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $file->created_at->format('Y-m-d H:i') }}
                                </td>
                                <td class="px-6 py-4 flex items-center gap-x-8">
                                    <a href="{{ route('files.download', $file->id) }}"
                                        class="">
                                        <svg class="w-6 h-6 text-indigo-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
                                          </svg>                                          
                                    </a>
                                    <a href="{{ route('files.download', $file->id) }}"
                                        class="">
                                        <svg class="w-6 h-6 text-rose-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                          </svg>
                                                                             
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            {{-- </div> --}}

        @endif
    {{-- </div> --}}
</x-layout>
