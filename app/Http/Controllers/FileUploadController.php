<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //

    function fileUpload(Request $request){
        $request->file('uploadFile')->store('uploadFiles');
    }
}
