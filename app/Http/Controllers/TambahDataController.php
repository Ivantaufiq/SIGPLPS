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
            $data = Profil::where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()->paginate(10);
        }
        if($request->has('jenis')){
            $data = Profil::where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')->latest()->paginate(10);
        }
        if($request->has('status')){
            $data = Profil::where('status', 'LIKE', '%' .$request->status . '%')->latest()->paginate(10);
        }
        if($request->has('status', 'jenis')){
            $data = Profil::where('status', 'LIKE', '%' .$request->status . '%')
                            ->where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')->latest()
                            ->paginate(10);
        }
        if($request->has('status', 'search')){
            $data = Profil::where('status', 'LIKE', '%' .$request->status . '%')
                            ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
                            ->paginate(10);
        }
        if($request->has('jenis', 'search')){
            $data = Profil::where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')
                            ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
                            ->paginate(10);
        }
        if($request->has('status', 'jenis', 'search')){
            $data = Profil::where('status', 'LIKE', '%' .$request->status . '%')
                            ->where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')
                            ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
                            ->paginate(10);
        }
        if(empty($request->jenis) && empty($request->search) && empty($request->status)){
            $data = Profil::latest()->paginate(10);
        }

        return view('dashboard.data.profil', compact('data'),[
            "title" => "SIGPLPS | Profil Sekolah"
        ]);
    }

    public function datasekolah()
    {
        return view ('dashboard.data.tambahdata',[
            "title" => "SIGPLPS | Tambah Data"
        ]);
    }

    public function insertdata(Request $request){
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'jenis_sekolah' => 'required',
            'status' => 'required',
            'npsn' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jumlah_siswa' => 'required',
            'jumlah_guru' => 'required',
            'jumlah_kelas' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        Profil::create($validatedData);

        return redirect()->route('profil')->with('success', ' Data Berhasil Ditambahkan');
    }

    public function tampildata($id){
        $data = Profil::find($id);
        // dd($data);
        return view('dashboard.data.tampildata', compact('data'), [
            "title" => "SIGPLPS | Edit Profil"
        ]);
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

    // export PDF
    public function exportsma(){
        $data = Profil::where('jenis_sekolah', 'SMA')->get();

        view()->share('data', $data);
        $pdf = Pdf::loadview('profilsekolah-pdf');
        return $pdf->download('profilsekolahSMA.pdf');
    }

    public function exportsmk(){
            $data = Profil::where('jenis_sekolah', 'SMK')->get();        
        view()->share('data', $data);
        $pdf = Pdf::loadview('profilsekolah-pdf');
        return $pdf->download('profilsekolahSMK.pdf');
    }

    public function exportsemua(){
        $data = Profil::all();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->download('profilsekolah.pdf');
    }

    public function exportsman(){
        $data = Profil::where('jenis_sekolah', 'SMA')
                    ->where('status', 'Negeri')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->download('profilsekolahsman.pdf');
    }

    public function exportsmas(){
        $data = Profil::where('jenis_sekolah', 'SMA')
                    ->where('status', 'Swasta')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->download('profilsekolahsmas.pdf');
    }

    public function exportsmkn(){
        $data = Profil::where('jenis_sekolah', 'SMK')
                    ->where('status', 'Negeri')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->download('profilsekolahsmkn.pdf');
    }
    public function exportsmks(){
        $data = Profil::where('jenis_sekolah', 'SMK')
                    ->where('status', 'Swasta')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->download('profilsekolahsmks.pdf');
    }

    public function exportexcel(){
        return Excel::download(new ProfilExport, 'profilsekolah.xlsx');
    }
}
