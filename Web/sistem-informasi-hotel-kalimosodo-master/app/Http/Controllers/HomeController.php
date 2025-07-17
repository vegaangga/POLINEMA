<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResrevRequest;
use App\Models\Blog;
use App\Models\Facility;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home()
    {
        Session::put('nav', 1);
        $rooms = Room::with('room_type')->where('is_active', 1)->latest()->limit(3)->get();
        $roomType = RoomType::where('is_active', 1)->get();
        return view('user.home', compact('roomType', 'rooms'));
    }

    public function blog()
    {
        Session::put('nav', 2);
        $blogs = Blog::where('is_active', 1)->paginate(6);
        return view('user.blog', compact('blogs'));
    }

    public function detailBlog($id)
    {
        Session::put('nav', 2);
        $blog = Blog::findOrFail($id);
        return view('user.detail-blog', compact('blog'));
    }

    public function room()
    {
        Session::put('nav', 3);
        $rooms = Room::with('room_type')->where('is_active', 1)->paginate(9);
        return view('user.room', compact('rooms'));
    }

    public function detailRoom($id)
    {
        Session::put('nav', 3);
        $room = Room::with('room_type', 'facilities')->findOrFail($id);
        $reserv = Reservation::where('room_id', $room->id)->first();
        return view('user.detail-room', compact('room', 'reserv'));
    }

    public function facility()
    {
        Session::put('nav', 4);
        $facility = Facility::where('is_active', 1)->get();
        return view('user.facility', compact('facility'));
    }

    public function about()
    {
        Session::put('nav', 5);
        return view('user.about');
    }

    public function contact()
    {
        Session::put('nav', 6);
        return view('user.contact');
    }

    public function searchRoom(Request $request)
    {
        $payload = $request->only(['check_in', 'check_out', 'room_type_id']);
        $rooms = Room::with('room_type', 'facilities')->where([
            'room_type_id' => $request->room_type_id,
            'is_active' => 1
        ])->paginate(9);
        return view('user.room', compact('rooms'));
    }

    public function reservation(ResrevRequest $request)
    {
        $user = Auth::user();
        $reserv = Reservation::where('room_id', $request->room_id)->first();
        if ($reserv) {
            return redirect()->back()->with('warning', 'Kamar sudah dalam pesanan orang lain');
        }
        $payload = $request->only(['room_id', 'guest', 'check_out', 'check_in']);
        $payload['users_id'] = $user->id;
        Reservation::create($payload);
        return redirect()->route('user.reservation.index');
    }
}