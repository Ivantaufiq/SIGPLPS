<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use App\Exports\ProfilExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class KelolaDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $my_url = config('app.url');
        if($request->has('search')){
            $data = Profil::where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()->paginate(45);
        }
        if($request->has('status', 'search')){
            $data = Profil::where('status', 'LIKE', '%' .$request->status . '%')
                            ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
                            ->paginate(45);
                            $data->withPath('?status=Negeri&search=');
        }
        if($request->has('jenis', 'search')){
            $data = Profil::where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')
                            ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
                            ->paginate(45);
                            $data->withPath('?jenis=SMA&search=');
        }
        
        if($request->has('status', 'jenis', 'search')){
            $data = Profil::where('status', 'LIKE', '%' .$request->status . '%')
                            ->where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')
                            ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
                            ->paginate(45);
                            $data->withPath('?jenis=SMA&status=Negeri&search=');
        }
        
        if($request->has('status', 'jenis', 'search')){
            $data = Profil::where('status', 'LIKE', '%' .$request->status . '%')
                            ->where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')
                            ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
                            ->paginate(45);
                            $data->withPath('?jenis=SMK&status=Swasta&search=');
        }
        
        // if(url()->full() == $my_url . "dashboard/profil?jenis=SMK&search="){
        //     $data = Profil::where('jenis_sekolah', 'LIKE', '%' .$request->jenis . '%')
        //                     ->where('nama_sekolah', 'LIKE', '%' .$request->search . '%')->latest()
        //                     ->paginate(45);
        //                     $data->withPath('?jenis=SMK&search=');
        // }
        
        
        if(empty($request->jenis) && empty($request->search) && empty($request->status)){
            $data = Profil::latest()->paginate(45);
        }

        return view('dashboard.data.profil', compact('data', 'my_url'),[
            "title" => "SIGPLPS | Kelola Data Profil Sekolah"
        ]);
    }

    public function tambahdata_View()
    {
        return view ('dashboard.data.tambahdata',[
            "title" => "SIGPLPS | Tambah Data Profil Sekolah"
        ]);
    }

    public function tambahdata(Request $request){
        $validatedData = $request->validate([
            'nama_sekolah' => 'required',
            'jenis_sekolah' => 'required',
            'status' => 'required',
            'npsn' => 'required',
            'akreditasi' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'jumlah_siswa' => 'required',
            'jumlah_guru' => 'required',
            'jumlah_kelas' => 'required',
            'jurusan' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        Profil::create($validatedData);

        return redirect()->route('profil')->with('success', ' Data Berhasil Ditambahkan');
    }

    public function editdata_View($id){
        $data = Profil::find($id);
        // dd($data);
        return view('dashboard.data.editdata', compact('data'), [
            "title" => "SIGPLPS | Edit Profil"
        ]);
    }

    public function editdata(Request $request, $id){
        $data = Profil::find($id);
        $data->update($request->all());
        return redirect()->route('profil')->with('success', ' Data Berhasil Diperbarui');
    }

    public function delete($id){
        $data = Profil::find($id);
        $data->delete();
        return redirect()->route('profil')->with('success', ' Data Berhasil Dihapus');
    }

    public function cetakpdf(){
        $data = Profil::all();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
    }

    public function cetakexcel(){
        return Excel::download(new ProfilExport, 'profilsekolah.xlsx');
    }



    

    // export PDF
    // public function exportsma(){
    //     $data = Profil::where('jenis_sekolah', 'SMA')->get();

    //     view()->share('data', $data);
    //     $pdf = Pdf::loadview('profilsekolah-pdf');
    //     $pdf->setPaper('A4', 'landscape');
    //     return $pdf->stream();
    // }

    // public function exportsmk(){
    //         $data = Profil::where('jenis_sekolah', 'SMK')->get();        
    //     view()->share('data', $data);
    //     $pdf = Pdf::loadview('profilsekolah-pdf');
    //     $pdf->setPaper('A4', 'landscape');
    //     return $pdf->stream();
    // }

    // public function exportsman(){
    //     $data = Profil::where('jenis_sekolah', 'SMA')
    //                 ->where('status', 'Negeri')                
    //                 ->get();     
    // view()->share('data', $data);
    // $pdf = Pdf::loadview('profilsekolah-pdf');
    // $pdf->setPaper('A4', 'landscape');
    // return $pdf->stream();
    // }

    // public function exportsmas(){
    //     $data = Profil::where('jenis_sekolah', 'SMA')
    //                 ->where('status', 'Swasta')                
    //                 ->get();     
    // view()->share('data', $data);
    // $pdf = Pdf::loadview('profilsekolah-pdf');
    // $pdf->setPaper('A4', 'landscape');
    // return $pdf->stream();
    // }

    // public function exportsmkn(){
    //     $data = Profil::where('jenis_sekolah', 'SMK')
    //                 ->where('status', 'Negeri')                
    //                 ->get();     
    // view()->share('data', $data);
    // $pdf = Pdf::loadview('profilsekolah-pdf');
    // $pdf->setPaper('A4', 'landscape');
    // return $pdf->stream();
    // }
    
    // public function exportsmks(){
    //     $data = Profil::where('jenis_sekolah', 'SMK')
    //                 ->where('status', 'Swasta')                
    //                 ->get();     
    // view()->share('data', $data);
    // $pdf = Pdf::loadview('profilsekolah-pdf');
    // $pdf->setPaper('A4', 'landscape');
    // return $pdf->stream();
    // }


}
