<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Exports\ProfilExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class TambahDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Profil::where('nama_sekolah', 'LIKE', '%' .$request->search. '%')->paginate(10);
        }else{
            
            $data = Profil::paginate(10);
        }

        return view('dashboard.data.profil', compact('data'));
    }

    public function datasekolah()
    {
        return view ('dashboard.data.tambahdata');
    }

    public function insertdata(Request $request){
        Profil::create($request->all());
        return redirect()->route('profil')->with('success', ' Data Berhasil Ditambahkan');
    }

    public function tampildata($id){
        $data = Profil::find($id);
        // dd($data);

        return view('dashboard.data.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Profil::find($id);
        $data->update($request->all());
        return redirect()->route('profil')->with('success', ' Data Berhasil Diperbarui');
    }

    public function delete($id){
        $data = Profil::find($id);
        $data->delete();
        return redirect()->route('profil')->with('success', ' Data Berhasil Dihapus');
    }

    public function exportpdf(){
        $data = Profil::all();

        view()->share('data', $data);
        $pdf = Pdf::loadview('profilsekolah-pdf');
        return $pdf->download('profilsekolah.pdf');
    }

    public function exportexcel(){
        return Excel::download(new ProfilExport, 'profilsekolah.xlsx');
    }
}
