<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinyController extends Controller
{
    public function uploadImage(Request $request)
    {
        $imgpath = $request->file('file')->store('tiny_images', 'public_uploads');
        return response()->json(['location' => "/uploads/$imgpath"]);
    }
}
