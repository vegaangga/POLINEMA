<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Internship;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::count();
        $admin = User::where('level', 'Admin')->count();
        $dosen = User::where('level', 'Dosen')->count();
        $mahasiswa = User::where('level', 'Mahasiswa')->count();
        $internship_group = Internship::count();
        $proposal = Internship::where('proposal', '!=', '')->count();
        $application_letter = Internship::where('application_letter', '!=', '')->count();
        $response_letter = Internship::where('response_letter', '!=', '')->count();

        return view('admin.dashboard', compact(
            'user',
            'internship_group',
            'application_letter',
            'response_letter',
            'admin',
            'dosen',
            'mahasiswa',
            'proposal'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nip_nim.required' => 'nip/nim tidak boleh kosong.',
        ];

        \Validator::make([
            'nip_nim' => 'required|unique',
            'name' => 'required',
            'class' => 'required',
            'faculty' => 'required',
            'majors' => 'required',
            'level' => 'required',
            'username' => 'required|unique',
            'password' => 'required'
        ], $messages);

        Student::create([
            'nip_nim' => $request->nip_nim,
            'name' => $request->name,
            'class' => $request->class,
            'faculty' => $request->faculty,
            'majors' => $request->majors,
            'level' => $request->level,
            'username' => $request->level,
            'password' => $request->level
        ]);

        return redirect('/students')->with('status', 'Student Data Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
