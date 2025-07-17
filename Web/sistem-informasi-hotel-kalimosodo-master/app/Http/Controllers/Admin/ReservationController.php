<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use function App\Helpers\dateDiffInDays;
use function App\Helpers\rupiah;

class ReservationController extends Controller
{
    protected $model;

    public function __construct(Reservation $reservation)
    {
        $this->model = new Repository($reservation);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Reservation::with('user', 'room')->get();
            return datatables()->of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($data) {
                    if ($data->status == 0) {
                        return '<a href="#" class="btn btn-sm btn-danger btn-edit-status" data-bs-toggle="modal"
                data-bs-target="#editStatusModal"
                data-id="' . $data->id . '">Belum Diverifikasi</a>';
                    }
                    return '<a href="#" class="btn btn-sm btn-success btn-edit-status" data-bs-toggle="modal"
                data-bs-target="#editStatusModal"
                data-id="' . $data->id . '">Sudah Diverifikasi</a>';
                })
                ->editColumn('name', function ($data) {
                    return $data->user->name;
                })
                ->editColumn('room', function ($data) {
                    return $data->room->name;
                })
                ->editColumn('price', function ($data) {
                    $cin = $data->check_in;
                    $cout = $data->check_out;
                    $price = $data->room->price;
                    $day = dateDiffInDays($cin, $cout);
                    $guest = $data->guest;
                    $total = ($day * $price) * $guest;
                    return rupiah($total);
                })
                ->addColumn('action', function ($data) {
                    $update = '<a href="/admin/reservation/' . $data->id . '/edit" ><span class="badge bg-success">
                <i class="fas fa-edit"></i>
            </span></a>
            <a href="#" data-bs-toggle="modal" class="btn-show-reservation"
                data-bs-target="#showReservationModal"
                data-id="' . $data->id . '"><span class="badge bg-info">
                <i class="fas fa-eye"></i>
            </span></a>
            <a href="#" data-bs-toggle="modal" class="btn-delete-reservation"
                data-bs-target="#deleteReservationModal"
                data-id="' . $data->id . '"><span class="badge bg-danger">
                <i class="fas fa-trash"></i>
            </span></a>
                ';
                    return $update;
                })
                ->rawColumns(['action', 'status', 'room', 'price'])
                ->make(true);
        }
        $reservation = Reservation::with('user', 'room')->get();
        return view('admin.reservation.index', compact('reservation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roomType = RoomType::where('is_active', 1)->get();
        $users = User::where('role', 0)->get();
        return view('admin.reservation.create', compact('roomType', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reserv = Reservation::where('room_id', $request->room_id)->first();
        if ($reserv) {
            return redirect()->back()->with('error', 'Kamar sudah dalam pesanan orang lain');
        }
        $payload = $request->only(['room_id', 'users_id', 'guest', 'check_out', 'check_in']);
        $this->model->create($payload);
        return redirect()->route('reservation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Reservation::with('user', 'room')->first();
        $cin = $data->check_in;
        $cout = $data->check_out;
        $price = $data->room->price;
        $day = dateDiffInDays($cin, $cout);
        $guest = $data->guest;
        $total = rupiah(($day * $price) * $guest);
        $dataPrice = [
            'days' => $day,
            'totalPrice' => $total,
            'price' => rupiah($price)
        ];
        return response()->json(['html' => view('admin.reservation.show', compact('data', 'dataPrice'))->render()], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->show($id);
        $roomType = RoomType::where('is_active', 1)->get();
        $users = User::where('role', 0)->get();
        $room = Room::where('room_type_id', $data->room->room_type_id)->get();
        $cin = $data->check_in;
        $cout = $data->check_out;
        $price = $data->room->price;
        $day = dateDiffInDays($cin, $cout);
        $guest = $data->guest;
        $total = rupiah(($day * $price) * $guest);
        $dataPrice = [
            'days' => $day,
            'totalPrice' => $total,
            'price' => rupiah($price)
        ];
        return view('admin.reservation.edit', compact('roomType', 'users', 'data', 'room', 'dataPrice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserv = Reservation::where('room_id', $request->room_id)->first();
        if ($reserv) {
            return redirect()->back()->with('error', 'Kamar sudah dalam pesanan orang lain');
        }
        $payload = $request->only(['room_id', 'users_id', 'guest', 'check_out', 'check_in']);
        $this->model->update($payload, $id);
        return redirect()->route('reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return response()->json(['success' => true], 200);
    }

    public function editStatus(Request $request, $id)
    {
        $reserv = Reservation::findOrFail($id);
        $reserv->update([
            'status' => $request->status
        ]);
        return response()->json(['success' => true], 200);
    }

    public function getStatus($id)
    {
        $reserv = Reservation::findOrFail($id);
        return response()->json(['data' => $reserv], 200);
    }
}
