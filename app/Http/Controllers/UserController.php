<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\Swimmer;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function loadProfile(){
        $user = User::find(auth()->user()->id);
        $squads = Squad::all();
        $swimmer = Swimmer::find(auth()->user()->id);
        
        return view('Account.profile',compact('user','squads','swimmer'));
    }
    
    public function updateProfileAction(Request $request){
        $valid = $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'address'=>'required',
            'phone_number'=>'required',
        ]);
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        $user->update($valid);
        //
        $swimmer = Swimmer::where('user_id',$userId)->first();
        if(!$swimmer){
            $createSwimmer = Swimmer::create([
                'user_id'=>$userId,
                'squad_id'=>$request->squad_id,
            ]);
        }
        return redirect()->back()->with([
            'message'=>'Profile updated successfully',
            'alert-type'=>'success'
        ]);

    }
    

    public function getParentList(){
        $parents = User::where('role_id',2)->get();
        return view('Account.parents')->with([
            'parents'=>$parents,
        ]);
    }

    public function createParent(Request $request){
        $parentId = $request->parent_id;
        $parent = User::find($parentId);

        $swimmers = Swimmer::whereDoesntHave('parent')->get();

        if($parentId){

            $swimmers = Swimmer::all();
        }

        

        return view("Account.create_parents")->with([
            'parent'=>$parent,
            'swimmers'=>$swimmers,
            'parentId'=>$parentId
        ]);
    }

    public function createParentAction(Request $request){

        $parentId = $request->parent_id;

        if($parentId){

            $parent = User::find($parentId);
            $parent->first_name = $request->first_name;
            $parent->last_name = $request->last_name;
            $parent->update();
            return redirect('/admin/parents')->with([
                'alert-type'=>'success',
                'message'=>'Parents has been successfully updated'
            ]);
        }
        else{
            $valid = $request->validate([
                'email'=>'required|email|max:225|unique:users,email',
                'first_name' => 'required|max:225',
                'last_name' => 'required|max:225',
                'password' => 'required|min:7|max:255'
                
            ]);

            $valid['role_id']=2;

            $newSquad = User::create($valid);
            $swimmerId = $request->swimmer_id;

            $swimmer = Swimmer::find($swimmerId);
            $swimmer->parent_id = $newSquad->id;
            $swimmer->update();

            return redirect('/admin/parents')->with([
                'alert-type'=>'success',
                'message'=>'Parent has been successfully created'
            ]);
        }


    }
    
    public function getCoachesList(){

        $coaches = User::where('role_id',4)->get();
        return view('Account.coaches')->with([
            'coaches'=>$coaches,
        ]);
    }
    public function createCoach(Request $request){
        $coachId = $request->coach_id;
        $coach = User::find($coachId);

    

        

        return view("Account.create_coaches")->with([
            'coach'=>$coach,
            'coachId'=>$coachId,
        ]);
    }

    public function createCoachAction(Request $request){

        $coachId = $request->coach_id;

        if($coachId){

            $coach = User::find($coachId);
            $coach->first_name = $request->first_name;
            $coach->last_name = $request->last_name;
            $coach->update();
            return redirect('/admin/coaches')->with([
                'alert-type'=>'success',
                'message'=>'Coach has been successfully updated'
            ]);
        }
        else{
            $valid = $request->validate([
                'email'=>'required|email|max:225|unique:users,email',
                'first_name' => 'required|max:225',
                'last_name' => 'required|max:225',
                'password' => 'required|min:7|max:255'
                
            ]);

            $valid['role_id']=4;

            $newSquad = User::create($valid);

            return redirect('/admin/coaches')->with([
                'alert-type'=>'success',
                'message'=>'Coach has been successfully created'
            ]);
        }


    }

}
