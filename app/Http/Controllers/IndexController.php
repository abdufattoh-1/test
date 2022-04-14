<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Collective;
use App\Models\Image;
use App\Models\Adres;
use App\Models\Tag;

class IndexController extends Controller
{
    public function index()
    {
        $images = Image::paginate(2);
        $tags = Tag::all();
        return view('index', compact("images",'tags'));
    }

    public function photo_detail($id)
    {
        $images = Image::findOrFail($id);
        $images->views = $images->views+1;
        $images->save();
        $rand = Image::where('id','!=',$id)->inRandomOrder()->limit(8)->get();
        return view('photo-detail', compact('images','rand'));
    }

    public function about()
    {
        return view('about');
    }

    public function video_detail()
    {
        return view('video-detail');
    }

    public function videos()
    {
        return view('videos');
    }
    
    public function contact()
    {
        $adres = Adres::all();
        $collective = Collective::all();
        return view('contact',compact('adres','collective'));
    }
}
