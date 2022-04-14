<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collective;

class CollectiveController extends Controller
{
    public function index()
    {
        $collective = Collective::all();
        return view('admin.collective.all',compact('collective'));
    }

    public function create()
    {
        return view('admin.collective.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'titles'=>'required',
            'about'=>'required',
            'imag'=>'required|mimes:jpeg,jpg,gif,png|max:4096'
        ]);
        $collective = new Collective();
        $collective->name = $request->name;
        $collective->titles = $request->titles;
        $collective->about = $request->about;
        $image = $request->file('imag');
        // dd($image);
        $imageName = md5(microtime()).".".$image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $image_path = 'storage/images/'.$imageName;
        $collective->imag = $image_path;
        $collective->save();   
        return redirect("/collective");
    }

    public function show($id)
    {
        $collective = Collective::findOrFail($id);
        return view('admin.collective.show', compact("collective"));
    }

    public function edit($id)
    {
        $collective = Collective::findOrFail($id);
        return view('admin.collective.edit', compact("collective"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'titles'=>'required',
            'about'=>'required',
            // 'imag'=>'required|mimes:jpeg,jpg,gif,png|max:4096'
        ]);
        $collective = Collective::findOrFail($id);
        $collective->name = $request->name;
        $collective->titles = $request->titles;
        $collective->about = $request->about;

        if($request->has('imag')){
            $image = $request->file('imag');
            $imageName = md5(rand(1111,9999).microtime()) . "." . $image->getClientOriginalExtension();
            // dd($imageName);
            $image->storeAs('public/images', $imageName);
            unlink($collective->image);
            $collective->image = "storage/images/".$imageName;
        }
        $collective->save();
        return redirect('/collective');
    }

    public function destroy($id)
    {
        $collective = Collective::find($id);
        if ($collective) {
            $collective->delete();
            return redirect()->back();
        }else{
            return[
                'success'=>false,
                'msassage'=>'Ohshamadi bu oldin chopilganakan',
            ]; 
        }
    }
}
