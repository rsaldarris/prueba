<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Automovil;
use Illuminate\Support\Facades\Lang;

class AutomovilController extends Controller{

    public function show(){
        $data = [];                
        $data["title"] = "Lista de automoviles";
        $data["automovil"] = Automovil::all();
        return view('automovil.show')->with("data",$data);
    }

    public function edit($id){
        $data = [];
        $automovil = Automovil::findOrFail($id);
        $data["title"] = $automovil->getId();
        $data["automovil"] = $automovil;
        return view('automovil.edit')->with("data", $data);
    }

    public function create(){
        $data = [];
        $data["title"] = "Create Automovil";
        // $data["posts"] = Automovil::all();
        return view('automovil.create')->with("data", $data);
    }

    public function saveEdit(Request $request){
        //arrebatadodandovueltaenlajeepeta$request->validate(Automovil::validate());
        $id = $request->input('id');
        Automovil::where('id',$id)->update($request->only(["placa",'marca', "modelo",'valor_comercial','valor_alquiler','disponible']));
        $message = 'Celebralo curramba';
        return redirect()->route('automovil.showpost',$id)->with('success',$message);
    }

    public function save(Request $request){
        $request->validate(Automovil::validate());
        Automovil::create($request->only(["placa", 'marca', "modelo",'valor_comercial','valor_alquiler','disponible']));
        $message = 'Carro creado';
        return back()->with('success',$message);
    }

    public function showpost($id){
        $data = [];
        $automovil = Automovil::findOrFail($id);                
        $data["title"] =$automovil->getPlaca();
        $data["automovil"] = $automovil;
        return view('automovil.showpost')->with("data",$data);
    }
    
    public function delete($id){
        $automovil= Automovil::find($id);
        $automovil->delete();
        $message = Lang::get('messages.postDeleted');
        return redirect('automovil/show')->with('deleted',$message);
    }
}
