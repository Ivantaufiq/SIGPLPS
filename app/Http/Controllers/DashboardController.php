<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Profil::count();
        $datasma = Profil::where('jenis_sekolah', 'SMA')->count();
        $datasmk = Profil::where('jenis_sekolah', 'SMK')->count();
        $datasman = Profil::where('jenis_sekolah','SMA')
                            ->where('status','Negeri')->count();
        $datasmas = Profil::where('jenis_sekolah','SMA')
                            ->where('status','Swasta')->count();                    
        $datasmkn = Profil::where('jenis_sekolah','SMK')
                            ->where('status','Negeri')->count();                    
        $datasmks = Profil::where('jenis_sekolah','SMK')
                            ->where('status','Swasta')->count();                    
        
        return view('dashboard.index', compact('data', 'datasma', 'datasmk', 'datasman', 'datasmas', 'datasmkn', 'datasmks'),[
            "title" => "SIGPLPS | Dashboard"
        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

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
