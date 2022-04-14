<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vidio;
use App\Models\Tag;
use Illuminate\Support\Str;

class VidioController extends Controller
{
    public function index()
    {
        // return 'hi';
        $videos = Vidio::all();
        return view('admin.video.all',compact('videos'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.video.create',compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'tag_id'=>'required|numeric',
            'info'=>'required',
            'video'=>'required',
            'image'=>'required|mimes:jpeg,jpg,gif,png|max:4096'
        ]);
        $slug = Str::slug($request->name,"-");
        $videos = new Vidio();
        $videos->name = $request->name;
        $videos->info = $request->info;
        $videos->tag_id = $request->tag_id;
        $videos->slug = $slug;
        $image = $request->file('image');
        $imageName = md5(microtime()).".".$image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $image_path = 'storage/images/'.$imageName;
        $videos->image = $image_path;
        // @dd($request->file('video'));
        $video = $request->file('video');
        $videoName = md5(microtime()).".".$video->getClientOriginalExtension();
        $video->storeAs('public/videos', $videoName);
        $video_path = 'storage/videos/'.$videoName;
        $videos->video = $video_path;
        $videos->save();   
        return redirect("/admin/video");
    }

    public function show($id)
    {
        $image = Vidio::findOrFail($id);
        return view('admin.video.show', compact("image"));
    } 

    public function edit($id)
    {
        $video = Vidio::findOrFail($id);
        $tags = Tag::all();
        return view('admin.video.edit', compact("video"),compact('tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            // 'tag_id'=>'required|numeric',
            'info'=>'required'
        ]);
        $slug = Str::slug($request->name,"-");
        $videos = Vidio::findOrFail($id);
        $videos->name = $request->name;
        $videos->info = $request->info;
        $videos->tag_id = $request->tag_id;
        $videos->slug = $slug;
        $videos->status = $request->status;

        if($request->has('image')){
            $imageName = md5(rand(1111,9999).microtime()) . "." . $request->file('image')->extension();
            $request->image->storeAs('public/images', $imageName);
            unlink($videos->image);
            $videos->image = "storage/images/".$imageName;
        }
        if($request->has('video')){
            $video = $request->file('video');
            $videoName = md5(microtime()).".".$video->getClientOriginalExtension();
            $video->storeAs('public/videos', $videoName);
            unlink($videos->video);
            $videos->video = 'storage/videos/'.$videoName;

        }
        $videos->save();
        return redirect('/admin/videos');
    }

    public function destroy($id)
    {
        $imags = Video::find($id);
        if ($imags) {
            $imags->delete();
            return redirect()->back();
        }else{
            return[
                'success'=>false,
                'msassage'=>'Ohshamadi bu oldin chopilganakan',
            ]; 
        }
    }
}
