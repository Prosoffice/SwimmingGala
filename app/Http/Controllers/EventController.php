<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gala;
use App\Models\Squad;
use App\Models\Stroke;
use App\Models\Swimmer;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEventList(Request $request){
        $events = Event::all();

        $isParent = $request->isParent;
        $isCoach = $request->isCoach;
        $isSwimmer = $request->isSwimmer;
        if($isParent){
            $swimmer = Swimmer::where('parent_id',auth()->user()->id)->first();
            $events = Event::where('swimmer_id',$swimmer->id)->get();
        }
        if($isCoach){
            $squad = Squad::where('coach_id',auth()->user()->id)->first();
            $events = Event::where('squad_id',$squad->id)->get();
        }
        if($isSwimmer){
            $swimmer = Swimmer::where('user_id',auth()->user()->id)->first();
            $events = Event::where('swimmer_id',$swimmer->id)->get();
        }
        
        return view('Events.event')->with([
            'events'=>$events,
        ]);

    }
    public function addEvent(Request $request){

        
        $swimmers = Swimmer::all();
        $strokes = Stroke::all();
        $galas = Gala::all();

        $isCoach = $request->isCoach;
        if($isCoach){
            $squad = Squad::where('coach_id',auth()->user()->id)->first();
            $swimmers = Swimmer::where('squad_id',$squad->id)->get();
        }
        
        return view('Events.add_event')->with([
            'swimmers'=>$swimmers,
            'strokes'=>$strokes,
            'galas'=>$galas
        ]);
    }
    public function addEventAction(Request $request){
        $valid = $request->validate([
            'swimmer_id'=>'required',
            'distance'=>'required',
            'stroke_id'=>'required',
            'finish_time'=>'required',
            'event_type'=>'required',
        ]);

        $swimmer = Swimmer::find($request->swimmer_id);
        $galaId =$request->gala_id;
        if($request->event_type=='Training'){
            $galaId = null;
        }

        $saveData = Event::create([
            ...$valid,
            'squad_id'=>$swimmer->squad_id,
            'gala_id'=>$galaId??null,
        ]);

        if($saveData){
            return redirect('/events')->with([
                'alert-type'=>'success',
                'message'=>'Event created successfully'
            ]);
        }

        
    }
}
