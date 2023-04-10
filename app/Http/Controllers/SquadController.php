<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\Swimmer;
use App\Models\User;
use App\Services\SquadService;
use \Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SquadController
{
    protected SquadService $squadService;
    public function __construct(SquadService $squadService)
    {
        $this->squadService = $squadService;
    }

    public function getSquadList()
    {

        $squads = $this->squadService->getSquadList();

        return view('Squad.index')->with(['squads'=>$squads]);
    }

    public function getSwimmerList(Request $request){
        $squadId = $request->query('squad_id');
        $squad = Squad::find($squadId);
        $swimmers = Swimmer::where('squad_id',$squadId)->get();

        return view('Squad.swimmers')->with(['swimmers'=>$swimmers,'squad'=>$squad]);
    }
    public function squadUpdate(Request $request){
        $squadId = $request->query('squad_id');
        $squad = Squad::find($squadId);
        $coaches = User::where('role_id',4)->get();
        return view('Squad.add_squad')->with(['squadId'=>$squadId, 'coaches'=>$coaches,'squad'=>$squad]);
    }
    public function squadUpdateAction(Request $request){
        $squadId = $request->squad_id;
        $coachId = $request->coach_id;
        $previousSquad = Squad::where('coach_id',$coachId)->first();
        if($previousSquad){
            $previousSquad->coach_id = null;
            $previousSquad->update();
        }
        if($squadId){

            $squad = Squad::find($squadId);
            $squad->name = $request->name;
            $squad->coach_id = $request->coach_id;
            $squad->update();
            return redirect('/admin/squads')->with([
                'alert-type'=>'success',
                'message'=>'Squad has been successfully updated'
            ]);
        }
        else{
            $valid = $request->validate([
                'name'=>'required'
            ]);

            $newSquad = Squad::create([
                'name'=>$request->name,
                'coach_id'=>$coachId
            ]);

            return redirect('/admin/squads')->with([
                'alert-type'=>'success',
                'message'=>'Squad has been successfully created'
            ]);
        }
    }
}
