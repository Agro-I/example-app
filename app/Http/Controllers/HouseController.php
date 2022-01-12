<?php

namespace App\Http\Controllers;
use App\Models\House;
use Illuminate\Http\Request;
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
        House::create($data);

        return redirect('/');
    }
    public function update(House $house) {
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

        $house->delete();
        return redirect()->route('houses');
    }
    public function show(House $house) {
        return view('house.show', compact('house'));
    }
}
