<?php

namespace App\Http\Controllers;
use App\Internship;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $internship = Internship::where('status', 2)->orWhere('status', 1)->orWhere('status', 3)->get();
        return view('admin.show_report', compact('internship'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $intern = Internship::findOrFail($id);
        return view('admin.agree_responseLetter', compact('intern'));
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
        if($request->hasFile('response_letter')){
            $response_letter = time() . '.' . $request->file('response_letter')->getClientOriginalExtension();
            $request->file('response_letter')->move(public_path('file'), $response_letter);
        }else{
            $response_letter = "1.pdf";
        }

        $intern->update([
            'status' => 2,
            'agency' => $request->agency,
            'start_an_internship' => $request->start_an_internship,
            'response_letter' => $response_letter
        ]);

        return redirect('/report')->with('status', 'Surat Balasan Data Successfully Approved!');
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

        return redirect('/report')->with('status', 'Surat Balasan Data Successfully Rejected!');
    }
}
