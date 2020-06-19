<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function form()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'file' => 'required',
        ], [
            'required' => 'There is no file choosen. Please choose a file.'
        ]);

        $file = $request->file("file");

        $filename = $file->getClientOriginalName();

        $file->move(public_path(), $filename);

        session()->flash('success_message', 'The file was uploaded.');

        return redirect(action('UploadController@form'));
    }
}

