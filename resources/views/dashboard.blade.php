<x-layout>
    @guest
        <a href="/register">Register</a>
        <a href="/login">login</a>
        <a href="/">dashboard</a>
    @endguest
    @auth
        <x-navbar></x-navbar>
    @endauth
    <div class="flex flex-col w-full m-6">
        @if (session('success'))
            <div>

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="bg-white rounded-md shadow-md">
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Select File (PDF, Image, or Video)</label>
                    <input type="file" name="file" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
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
