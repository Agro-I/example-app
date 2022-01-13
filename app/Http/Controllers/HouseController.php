<?php

namespace App\Http\Controllers;
use App\Models\House;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class HouseController extends Controller
{
    public function index(){
        $house =\App\Models\House::all();

        return view('house.index',data: compact('house'));
    }
    public function create() {

        return view('house.create');
    }
    public function edit(House $house) {
        if(! Gate::allows('house_update', $house)) {
            return response('You cannot delete, not your profile', 483);
        }
        return view('house.edit',compact('house'));
    }
    public function store() {
        $data = request()->validate([
            'emblem' => 'required',
            'name' => 'required',
            'ancestral_fortress' => 'required',
            'slogan' => 'required',
            'quantity_of_characters' => 'required',
            'quantity_of_live_characters'=> 'required',
        ]);
        $data['user_id']=Auth::id();
        House::create($data);

        return redirect('/');
    }
    public function update(House $house) {
        if(! Gate::allows('house_update', $house)) {
            return response('You cannot delete, not your profile', 483);
        }
        $valid = request()->validate([
            'emblem' => 'required',
            'name' => 'required',
            'ancestral_fortress' => 'required',
            'slogan' => 'required',
            'quantity_of_characters' => 'required',

        ]);
        $house->update($valid);
        return redirect('/');

    }
    public function destroy(House $house) {
        if(! Gate::allows('house_update', $house)) {
            return response('You cannot delete, not your profile', 483);
        }
        $house->delete();
        return redirect()->route('houses');
    }
    public function forceDelete($house)
    {
        $houseRelease = \App\Models\House::find($house);
        if (!Gate::allows('force_delete', $houseRelease)) abort(403);
        $user = User::find($houseRelease->user_id);
        $houseRelease->forceDelete();
        return redirect('/');
    }
    public function show(House $house) {
        return view('house.show', compact('house'));
    }
}
