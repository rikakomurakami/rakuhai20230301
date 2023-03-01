<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {

        // sampleディレクトリに画像を保存
        $request->file('image')->store('public/');

        return redirect('/');
    }
}
