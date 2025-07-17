<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Repositories\Repository;
use App\Http\Requests\RoomRequest;
use App\Models\RoomType;
use App\Models\Facility;
use Illuminate\Http\Request;

use function App\Helpers\deleteFoto;
use function App\Helpers\updateFoto;
use function App\Helpers\uploadFoto;

class RoomController extends Controller
{

    protected $model;

    public function __construct(Room $room)
    {
        $this->model = new Repository($room);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas = Facility::where('is_active', 1)->get();
        $room_type = RoomType::where('is_active', 1)->get();
        return view('admin.room.create', compact('room_type', 'fasilitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $payload = $request->only(['name', 'description', 'room_type_id', 'price']);
        $payload['is_active'] = $request->is_active == "on" ? 1 : 0;
        if ($request->hasFile('image')) {
            $payload['image'] = uploadFoto($request->file('image'), 'room');
        }
        $room = $this->model->create($payload);
        if ($request->fasilitas) $room->facilities()->sync($request->fasilitas);
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->model->getModel()::findOrFail($id);
        return response()->json(['success' => true, 'data' => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = Facility::where('is_active', 1)->get();
        $room_type = RoomType::where('is_active', 1)->get();
        $data = Room::with('facilities')->where('id', $id)->first();
        return view('admin.room.edit', compact('data', 'room_type', 'fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $payload = $request->only(['name', 'description', 'room_type_id', 'price']);
        $payload['is_active'] = $request->is_active == "on" ? 1 : 0;
        $room = Room::findOrFail($id);
        if ($request->hasFile('image')) {
            $payload['image'] = updateFoto($room->image, 'room', $request->file('image'), 'room');
        } else {
            $payload['image'] = $room->image;
        }
        $room->update($payload);
        if ($request->fasilitas) $room->facilities()->sync($request->fasilitas);
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::with('facilities')->findOrFail($id);
        if ($room->image) {
            deleteFoto($room->image, 'room');
        }
        if ($room->facilities) $room->facilities()->detach();
        $this->model->delete($id);
        return response()->json(['success' => $room], 200);
    }

    public function room()
    {
        $data = $this->model->with('room_type')->get();
        return datatables()->of($data)
            ->addIndexColumn()
            ->editColumn('room_type', function ($data) {
                return $data->room_type->name;
            })
            ->addColumn('action', function ($data) {
                $update = '<a href="' . route('room.edit', $data->id) . '" class="btn-edit-room"><span class="badge bg-success">
                <i class="fas fa-edit"></i>
            </span></a>
            <a href="#" data-bs-toggle="modal" class="btn-delete-room"
                data-bs-target="#deleteRoomModal"
                data-id="' . $data->id . '"><span class="badge bg-danger">
                <i class="fas fa-trash"></i>
            </span></a>
                ';
                return $update;
            })
            ->rawColumns(['action', 'room_type'])
            ->make(true);
    }

    public function getRoomHasFacilites($id)
    {
        $room = Room::with('facilities')->findOrFail($id);
        $facilities = [];
        foreach ($room->facilities as $fac) {
            $facilities[] = $fac->pivot->facility_id;
        }
        return response()->json($facilities);
    }

    public function getRoomByType($id)
    {
        $room = Room::where('room_type_id', $id)->get();
        return response()->json(['data' => $room], 200);
    }

    public function getPriceRoom($id)
    {
        $room = Room::where('id', $id)->pluck('price');
        return response()->json(['data' => $room], 200);
    }
}