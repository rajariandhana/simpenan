<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    public function edit(File $file){
        if(Auth::user()->cannot('edit-job',$file)) abort(403);
        // Gate::authorize('edit-file',$file);
        return view('');
    }
    public function index()
    {
        $files = File::where('user_id', auth()->id())->get();
        return view('dashboard', compact('files'));
    }


    public function store(Request $request){
        $request->validate([
            'file'=>'required|file|mimes:pdf,jpeg,png,mp4|max:10240'
        ]);
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = 'encrypted_files/' . uniqid() . '_' . $fileName;

        // Define cipher and key
        $cipher = "aes-256-cbc";
        $encryptionKey = openssl_random_pseudo_bytes(32);
        $ivSize = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes($ivSize);

        // Read the file and encrypt its contents
        $fileContents = file_get_contents($file->getPathname());
        $encryptedContents = openssl_encrypt($fileContents, $cipher, $encryptionKey, 0, $iv);

        // Store encrypted file
        Storage::put($filePath, $encryptedContents);

        // Store file information in the database
        $fileRecord = new File();
        $fileRecord->user_id = auth()->id();
        $fileRecord->file_name = $fileName;
        $fileRecord->file_path = $filePath;
        $fileRecord->encryption_key = $encryptionKey;
        $fileRecord->iv = $iv;
        $fileRecord->save();

        return back()->with('success', 'File uploaded and encrypted successfully!');
    }
    public function download($id)
    {
        $fileRecord = File::findOrFail($id);

        if (!Storage::exists($fileRecord->file_path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $encryptedContents = Storage::get($fileRecord->file_path);
        $cipher = "aes-256-cbc";
        $decryptedContents = openssl_decrypt($encryptedContents, $cipher, $fileRecord->encryption_key, 0, $fileRecord->iv);

        $mimeType = Storage::mimeType($fileRecord->file_path);

        return response()->streamDownload(function () use ($decryptedContents) {
            echo $decryptedContents;
        }, $fileRecord->file_name, [
            'Content-Type' => $mimeType,
            'Content-Transfer-Encoding' => 'binary',
            'Content-Disposition' => 'attachment; filename="' . $fileRecord->file_name . '"',
        ]);
    }


}
