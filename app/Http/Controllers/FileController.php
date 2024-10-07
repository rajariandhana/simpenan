<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function edit(File $file){
        if(Auth::user()->cannot('edit-job',$file)) abort(403);
        // Gate::authorize('edit-file',$file);
        return view('');
    }
}
