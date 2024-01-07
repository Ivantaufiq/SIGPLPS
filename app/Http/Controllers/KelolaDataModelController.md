<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaDataController;


// Route::get('/', function () {
//     return view('login.login');
// });

// Route::get('/home', [HomeController::class, 'home']);

// Route::get('/', function(){
//     return view('dashboard.index');
// })->middleware('auth');

Auth::routes();
Route::get('/register', function() {
    return redirect('/login');
});
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('/dashboard/profil', DashboardProfilController::class);

Route::get('/dashboard/profil', [KelolaDataController::class, 'index'])->name('profil');

Route::get('/dashboard/tambahdata', [KelolaDataController::class, 'tambahdataView'])->name('tambahdata');
Route::post('/dashboard/insertdata', [KelolaDataController::class, 'insertdata'])->name('insertdata');

Route::get('/dashboard/tampildata/{id}', [KelolaDataController::class, 'tampildata'])->name('tampildata');
Route::post('/dashboard/updatedata/{id}', [KelolaDataController::class, 'updatedata'])->name('updatedata');

Route::get('/dashboard/delete/{id}', [KelolaDataController::class, 'delete'])->name('delete');

// export pdf
Route::get('/dashboard/exportsma', [KelolaDataController::class, 'exportsma'])->name('exportsma');
Route::get('/dashboard/exportsmk', [KelolaDataController::class, 'exportsmk'])->name('exportsmk');
Route::get('/dashboard/exportsemua', [KelolaDataController::class, 'exportsemua'])->name('exportsemua');
Route::get('/dashboard/exportsman', [KelolaDataController::class, 'exportsman'])->name('exportsman');
Route::get('/dashboard/exportsmas', [KelolaDataController::class, 'exportsmas'])->name('exportsmas');
Route::get('/dashboard/exportsmkn', [KelolaDataController::class, 'exportsmkn'])->name('exportsmkn');
Route::get('/dashboard/exportsmks', [KelolaDataController::class, 'exportsmks'])->name('exportsmks');


//export excel
Route::get('/dashboard/exportexcel', [KelolaDataController::class, 'exportexcel'])->name('exportexcel');



//kelola
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
            "title" => "SIGPLPS | Kelola Data Sekolah"
        ]);
    }

    public function tambahdataView()
    {
        return view ('dashboard.data.tambahdata',[
            "title" => "SIGPLPS | Tambah Data Profil Sekolah"
        ]);
    }

    public function insertdata(Request $request){
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
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function exportsmk(){
            $data = Profil::where('jenis_sekolah', 'SMK')->get();        
        view()->share('data', $data);
        $pdf = Pdf::loadview('profilsekolah-pdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function exportsemua(){
        $data = Profil::all();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
    }

    public function exportsman(){
        $data = Profil::where('jenis_sekolah', 'SMA')
                    ->where('status', 'Negeri')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
    }

    public function exportsmas(){
        $data = Profil::where('jenis_sekolah', 'SMA')
                    ->where('status', 'Swasta')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
    }

    public function exportsmkn(){
        $data = Profil::where('jenis_sekolah', 'SMK')
                    ->where('status', 'Negeri')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
    }
    
    public function exportsmks(){
        $data = Profil::where('jenis_sekolah', 'SMK')
                    ->where('status', 'Swasta')                
                    ->get();     
    view()->share('data', $data);
    $pdf = Pdf::loadview('profilsekolah-pdf');
    $pdf->setPaper('A4', 'landscape');
    return $pdf->stream();
    }

    public function exportexcel(){
        return Excel::download(new ProfilExport, 'profilsekolah.xlsx');
    }
}
