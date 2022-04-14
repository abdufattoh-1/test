<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Tag;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin.images.all',compact('images'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.images.create',compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'tag_id'=>'required|numeric',
            'info'=>'required',
            'image'=>'required|mimes:jpeg,jpg,gif,png|max:4096'
        ]);
        $slug = Str::slug($request->name,"-");
        $images = new Image();
        $images->name = $request->name;
        $images->info = $request->info;
        $images->tag_id = $request->tag_id;
        $images->slug = $slug;
        $image = $request->file('image');
        $imageName = md5(microtime()).".".$image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $image_path = 'storage/images/'.$imageName;
        $images->image = $image_path;
        $images->save();   
        return redirect("/admin/images");
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);
        return view('admin.images.show', compact("image"));
    }

    public function edit($id)
    {
        $imags = Image::findOrFail($id);
        $tags = Tag::all();
        return view('admin.images.edit', compact("imags"),compact('tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            // 'tag_id'=>'required|numeric',
            'info'=>'required'
        ]);
        $slug = Str::slug($request->name,"-");
        $images = Image::findOrFail($id);
        $images->name = $request->name;
        $images->info = $request->info;
        $images->tag_id = $request->tag_id;
        $images->slug = $slug;
        $images->status = $request->status;

        if($request->has('image')){
            $imageName = md5(rand(1111,9999).microtime()) . "." . $request->file('image')->extension();
            $request->image->storeAs('public/images', $imageName);
            // Storage::delete($images->image);
            unlink($images->image);
            $images->image = "storage/images/".$imageName;
        }
        $images->save();
        return redirect('/admin/images');
    }

    public function destroy($id)
    {
        $imags = Image::find($id);
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
