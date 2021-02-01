<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\Event;

class EventController extends Controller
{
	public function index(){
		$results = Event::orderBy('id', 'desc')->paginate(10);
		return view('events.index', [
			'results' => $results,
		]);
	}

	public function add(){
		return view('events.add');
	}

	public function create(Request $request){
		$this->validate($request, [
            'name' 			=> ['required', 'string'],
            'description' 	=> ['required', 'string'],
            'laps' 			=> ['required', 'integer'],
            'status'	 	=> ['required', 'in:0,1'],
        ]);

        // Insert new event in system
        $obj = new Event();
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->laps = $request->laps;
        $obj->status = $request->status;
        $obj->save();

        // session()->flash('status', 'Price updated successfully.');
        // return redirect()->back();
        // return redirect('events');
        return redirect()->route('events')->with('status', 'Event added successfully.');
	}

	public function edit($id){
		$row = Event::findOrFail($id);
		return view('events.edit', [
			'row' => $row
		]);
	}

	public function update(Request $request, $id){
		$this->validate($request, [
            'name' 			=> ['required', 'string'],
            'description' 	=> ['required', 'string'],
            'laps' 			=> ['required', 'integer'],
            'status'	 	=> ['required', 'in:0,1'],
        ]);

    	$obj = Event::findOrFail($id);
    	$obj->name = $request->name;
        $obj->description = $request->description;
        $obj->laps = $request->laps;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->route('events')->with('status', 'Event updated successfully.');
	}

	public function destroy($id){
		$obj = Event::findOrFail($id);
    	$obj->delete();

        return redirect()->route('events')->with('status', 'Event deleted successfully.');
	}
}
