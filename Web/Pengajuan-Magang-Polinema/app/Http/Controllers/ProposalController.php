<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Internship;
// use App\Http\Controllers\AuthController as Auth;
class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
        $user = User::findOrFail($id);
        $id1 = null;

        foreach ($user->internship as $in){
            $id1 = $in->pivot->internship_id;
        }
        
        $data = $user->whereHas('internship', function($knt) use($id1){
            $knt->where('internship_id', $id1);
        })->get();

        $laporan = $user->whereHas('internship', function($knt) use($id){
            $knt->where('user_id', $id);
        })->get();
        
        // dd($laporan[0]->internship[0]->dosen->name);

        return view('mahasiswa.show_laporan', compact('data', 'laporan', 'id1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = \Auth::user()->id;
        $notIn = User::has('internship')->get('id');

        $user = User::where('level', 'Mahasiswa')
        ->where('id','!=', $id)->whereNotIn('id',$notIn)->get();
        
        return view('mahasiswa.upload_proposal', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa1 = \Auth::user()->id;
        if($request->hasFile('proposal')){
            $proposal = time() . '.' . $request->file('proposal')->getClientOriginalExtension();
            $request->file('proposal')->move(public_path('file'), $proposal);
        }else{
            $proposal = "1.pdf";
        }

        $intern = Internship::create([
            'proposal' => $proposal, 
            'status' => 0
        ]);

        $intern->user()->attach([
            $mahasiswa1,
            $request->mahasiswa2,
            $request->mahasiswa3
        ]);
    
        return redirect('/proposal')->with('status', 'Kelompok Magang Successfully Added!');
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
        $userID = array();
        $id1 = \Auth::user()->id;
        $intern = Internship::whereHas('user', function($knt) use($id){
            $knt->where('internship_id','!=', $id);
        })->get('id');
        $user = Internship::findOrFail($intern[0]->id);
        foreach ($user->user as $in){
            $userID[] =$in->id;
        }
        
        $data = User::where('level', 'Mahasiswa')
        ->where('id','!=', $id1)->whereNotIn('id',$userID)->get();

        $userLogin = \Auth::user();

        $userss = Internship::where('id', $id)->with(['user' => function($query) use($userLogin){
            $query->where('users.id', '!=', $userLogin->id);
        }])->first();

        return view('mahasiswa.edit_proposal', compact('data', 'userss'));
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
        $mahasiswa1 = \Auth::user()->id;
        $intern = Internship::findOrFail($id);
        $proposal = $intern->proposal;
        if ($request->hasFile('proposal')){
            $proposal = time() . '.' . $request->file('proposal')->getClientOriginalExtension();
            $request->file('proposal')->move(public_path('proposal'), $proposal);
            if (file_exists(public_path('file/' . $proposal))){
                unlink(public_path('file/' . $proposal));
            }else{
                echo "File does not exists";
            }
        }

        $intern->update([
            'proposal' => $proposal, 
            'status' => 0
        ]);

        $intern->user()->sync([
            $mahasiswa1,
            $request->mahasiswa2,
            $request->mahasiswa3
        ]);
    
        return redirect('/proposal')->with('status', 'Kelompok Magang Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Internship::findOrFail($id);
        if (file_exists(public_path('file/' . $data->proposal))){
            unlink(public_path('file/' . $data->proposal));
        }
        $data->user()->detach();
        return redirect('/proposal')->with('status', 'Kelompok Magang Successfully Deleted!');
    }
}
