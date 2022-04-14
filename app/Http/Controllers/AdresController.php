<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adres;

class AdresController extends Controller
{
    public function index()
    {
        $adres = Adres::all();
        return view('admin.adres.all',compact('adres'));
    }
    public function create(){
        $adres = Adres::all();
        return view('admin.adres.create',compact('adres'));
    }
    public function store(Request $request){
        $request->validate([
            'email'=>'required',
            'adres'=>'required',
            'telefon'=>'required|numeric',
            'url'=>'required',
            'info'=>'required',
        ]);
        $adres = new Adres();
        $adres->info = $request->info;
        $adres->adres = $request->adres;
        $adres->email = $request->email;
        $adres->tel = $request->telefon;
        $adres->url_adres = $request->url;
        $adres->save();   
        return redirect("/adres");
    }
    public function edit($id)
    {
        $adres = Adres::findOrFail($id);
        return view('admin.adres.edit', compact("adres"));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'email'=>'required',
            'adres'=>'required',
            'telefon'=>'required|numeric',
            'url'=>'required',
            'info'=>'required',
        ]);
        $adres = Adres::findOrFail($id);
        $adres->info = $request->info;
        $adres->adres = $request->adres;
        $adres->email = $request->email;
        $adres->tel = $request->telefon;
        $adres->url_adres = $request->url;
        $adres->save();   
        return redirect("/adres");
    }
}
