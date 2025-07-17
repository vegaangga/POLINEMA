<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Internship;

class AplicationLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $internship = Internship::where('status', 0)->get();
        return view('admin.show_aplicationLetter', compact('internship'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        $dosen = User::where('level', 'Dosen')->get();
        $intern = Internship::findOrFail($id);
        return view('admin.agree_aplicationLetter', compact('dosen', 'intern'));
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
        $intern = Internship::findOrFail($id);
        if($request->hasFile('application_letter')){
            $application_letter = time() . '.' . $request->file('application_letter')->getClientOriginalExtension();
            $request->file('application_letter')->move(public_path('file'), $application_letter);
        }else{
            $application_letter = "1.pdf";
        }
        
        $intern->update([
            'status' => 1,
            'supervisor' => $request->supervisor,
            'application_letter' => $application_letter
        ]);

        return redirect('/aplication_letter')->with('status', 'Surat Pengajuan Data Successfully Approved!');
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

    public function refuse(Request $request, $id)
    {
        $intern = Internship::findOrFail($id);
        $intern->update([
            'status' => 3
        ]);

        return redirect('/aplication_letter')->with('status', 'Surat Pengajuan Data Successfully Rejected!');
    }
}
