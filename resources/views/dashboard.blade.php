<x-layout>
    @guest
        <a href="/register">Register</a>
        <a href="/login">login</a>
        <a href="/">dashboard</a>
    @endguest
    @auth
        <x-navbar></x-navbar>
    @endauth
    <div class="flex flex-col w-full m-6 gap-y-6">
        @if (session('success'))
            <div class="bg-green-200 border border-green-500 text-green-800 px-4 py-2 rounded-md shadow-md w-fit">
                {{ session('success') }}
                {{-- File uploaded successfully --}}
            </div>
        @endif
        {{-- <div class=""> --}}
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" class="flex justify-between bg-white rounded-md shadow-md p-4 w-fit">
                @csrf
                <div class="flex items-center gap-x-4">
                    <label for="file">Select File (PDF, Image, or Video)</label>
                    <input type="file" name="file" class="" required>
                </div>
                <button type="submit" class="bg-indigo-500 px-4 py-2 rounded-md shadow-md text-white">Upload</button>
            </form>
        {{-- </div> --}}
        <div class="bg-white rounded-md shadow-md">
            @dump(App\Models\File::get())
            @if($files->isEmpty())
                <p>No files uploaded yet.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>File Name</th>
                            <th>Uploaded At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>{{ $file->file_name }}</td>
                                <td>{{ $file->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('files.download', $file->id) }}" class="btn btn-success">Download</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-layout>
