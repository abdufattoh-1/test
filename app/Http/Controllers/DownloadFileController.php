<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadFileController extends Controller
{
    function getFile($filename){
        $path = storage_path('app/public/'.$filename);
        return response()->download($path);
    }
}
