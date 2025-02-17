<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.room', compact('rooms'));
    }

    public function store(Request $request)
    {
        // validate the request
        $request->validate([
            'code' => 'required|string|max:25',
            'name' => 'required|string|max:100',
            'description' => 'string|max:255',
        ]);

        // store the room
        $room = Room::create($request->all());

        // redirect to the room list
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(string $id)
    {
        // get data
        $room = Room::find($id);

        if(!$room) return response()->json(['error' => 'Room not found'], 404);
        return response()->json($room);
    
    }

    public function update(Request $request, string $id)
    {
        // validate the request
        $request->validate([
            'code' => 'required|string|max:25|unique:rooms,id,'.$request->room_id,
            'name' => 'required|string|max:100',
            'description' => 'string|max:255',
        ]);

        // update the room
        $roomId = $request->room_id;
        $room = Room::find($roomId);
        if(!$room) return response()->json(['error' => 'Room not found'], 404);

        $room->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // redirect to the room list
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(string $id)
    {
        $room = Room::find($id);
        if(!$room) return response()->json(['error' => 'Room not found'], 404);

        $room->delete();

        // redirect to the room list
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
