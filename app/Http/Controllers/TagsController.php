<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    public function index(){
        $tags=Tag::all();
        return view('admin.Tags.all',compact('tags'));
    }
    public function create()
    {
        return view('admin.Tags.create');
    }
    public function store(Request $request){
        // return Str::slug($request->title_uz);
        $request->validate([
            'name'=>'required'
        ]);
        $slug = Str::slug($request->name,'-'); 
        Tag::create([
            'name'=>$request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('/tags') ;
        
    }
    public function edit($id){
        $tag = Tag::findOrFail($id);
        return view('admin.Tags.edit',compact('tag'));
        
    }
    public function update(Request $request,$id){
        $tag = Tag::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'status' =>'required'
        ]);
        $tag->name = $request->name;
        $tag->status = $request->status;
        $tag->save();
        return redirect('/tags');
    }public function destroy($id){
        $tag = Tag::find($id);
        if ($tag) {
            $tag->delete();
            return redirect()->back();
        }else{
            return[
                'success'=>false,
                'msassage'=>'Ohshamadi bu oldin chopilganakan',
            ]; 
        }
    }

}
