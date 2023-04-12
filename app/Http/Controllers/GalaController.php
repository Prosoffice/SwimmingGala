<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use Illuminate\Http\Request;

class GalaController extends Controller
{
    public function getGalaList(Request $request){
        $galas = Gala::all();
        return view('Events.gala')->with([
            'galas'=>$galas
        ]);
    }
    public function addGala(Request $request){

        $galaId = $request->gala_id;
        $gala= Gala::find($galaId);
        
        return view('Events.add_gala')->with([
            'gala'=>$gala
        ]);
    }
    public function addGalaAction(Request $request){
        $valid = $request->validate([
            'gala_name'=>'required',
            'start_date'=>'required',
            'end_date'=>'required'
        ]);

        $galaId = $request->gala_id;
        if($galaId){
            $gala= Gala::find($galaId);
            $gala->gala_name = $request->gala_name;
            $gala->start_date = $request->start_date;
            $gala->end_date = $request->end_date;
            if($gala->update()){
                return redirect('/galas')->with([
                    'alert-type'=>'success',
                    'message'=>' gala updated successfully'
                ]);
            }
        }
        else{
            $create = Gala::create($valid);
            if($create){
                return redirect('/galas')->with([
                    'alert-type'=>'success',
                    'message'=>' gala created successfully'
                ]);
            }

        }

        
        
    }
}
