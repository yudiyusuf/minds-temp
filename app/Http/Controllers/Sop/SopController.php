<?php

namespace App\Http\Controllers\Sop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequestmemo;
use App\Models\Sop;
use App\Models\User;
use App\Models\Filesop;
use App\Models\Filememo;
use App\Models\Computer;
use App\Models\BreakType;
use App\Models\Filedokumenpendukung;

use App\Models\FollowedUpRequest;
use App\Models\VerifiedRequest;

use App\Http\Requests\User\RequestRequest;

use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use PDF;
use DataTables;

class SopController extends Controller
{
    public function index() {
        $data = Sop::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = Sop::where('user_id', Auth::user()->id)->count();

        return view('sop.sop-mylist', compact('data','datacount'));
    }

    public function preview($id) {
        $ceksops = Sop::where('id', $id)->get();
        $cekformes = Sop::where('id', $id)->where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->get();
                if($cekformes != '[]'){
                    $oke = Auth::user()->id;
                }else{
                     $oke = NULL;
                }


        $data = Sop::findOrFail($id);
            foreach($ceksops as $ceksop){
                if($ceksop->user_id == Auth::user()->id or $ceksop->disetujui == Auth::user()->id or $ceksop->diperiksa == Auth::user()->id or $oke == Auth::user()->id){
                     return view('sop.sop-detail', compact('data'));
                }else{
                     return view('errors.403');
                }

            }
                // return response($oke);

    }

    public function edit($id) {
        $cekmemos = Sop::where('id', $id)->get();

        $data = Sop::findOrFail($id);
        $users          = User::all();
        $computers      = Computer::all();
        $boleh_dilihat = explode(',', $data->boleh_dilihat);
        $selectedss = $data->boleh_dilihat;
            foreach($cekmemos as $cekmemo){
                if($cekmemo->user_id == Auth::user()->id){
                    return view('sop.sop-edit', compact(['data','users','computers','boleh_dilihat','selectedss']));
                }else{
                     return view('errors.403');
                }

            }
                // return response($oke);

    }

    public function create() {
        $users          = User::all();
        $computers      = Computer::all();

        return view('sop.sop-add', [
            'users'   => $users,
            'computers'     => $computers,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'images.*' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xlsx,docx,xls,pdf|max:11048',
            'alurkerja.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $namasop = $request->namasop;
        $disetujui = $request->disetujui;
        $diperiksa = $request->diperiksa;
        $boleh_dilihat = implode(', ',$request->boleh_dilihat);
        $tgl_disetujui = $request->tgl_disetujui;
        $tgl_diperiksa = $request->tgl_diperiksa;
        $kebijakan_spesifik = $request->kebijakan_spesifik;
        $tujuan = $request->tujuan;
        $ketentuan_proses = $request->ketentuan_proses;
        $id = $request->id;


        $cekdiperiksas = Sop::where('id', $id)->get();
        $idsop = Sop::find($id);
        if($idsop){
            foreach($cekdiperiksas as $cekdiketahui){
                if($cekdiketahui->status_diperiksa == 'BELUM APPROVED'){
                        $updatesop = Sop::where('id',$request->id)->update([
                                    'namasop' => $namasop, 
                                    'disetujui' => $disetujui,
                                    'diperiksa' => $diperiksa,
                                    'tgl_disetujui' => $tgl_disetujui,
                                    'tgl_diperiksa' => $tgl_diperiksa,
                                    'boleh_dilihat' => $boleh_dilihat,
                                    'tujuan' => $tujuan,
                                    'user_id' => Auth::id(),
                                    'kebijakan_spesifik' => $kebijakan_spesifik,
                                    'tujuan' => $tujuan,
                                    'ketentuan_proses' => $ketentuan_proses,
                        ]);

                            $alurkerja = [];
                            if ($request->alurkerja){
                                foreach($request->alurkerja as $key => $image)
                                {
                                    $imageName = time().rand(1,99).'.'.$image->extension();  
                                    $image->move(public_path('filesop/alurkerja'), $imageName);
                      
                                    $alurkerja[] = [
                                            'filename' => $imageName,
                                            'nomor_sop' => $nomor_sop,
                                            'jenis_file' => 'alurkerja',
                                        ];
                                }
                            }
                            foreach ($alurkerja as $key => $image) {
                                $deletefilesop = Filesop::where('nomor_sop',$cekdiketahui->nomor_sop)->delete();
                                Filesop::create($image);
                            }

                            $images = [];
                            if ($request->images){
                                foreach($request->images as $key => $image)
                                {
                                    $imageName = time().rand(1,99).'.'.$image->extension();  
                                    $image->move(public_path('filesop/dokumenpendukung'), $imageName);
                      
                                    $images[] = [
                                            'filename' => $imageName,
                                            'nomor_sop' => $nomor_sop,
                                            'jenis_file' => 'dokumenpendukung',
                                        ];
                                }
                            }
                            foreach ($images as $key => $image) {
                                $deletefiledokumenpendukung = Filedokumenpendukung::where('nomor_sop',$cekdiketahui->nomor_sop)->delete();
                                Filedokumenpendukung::create($image);
                            }

                        return redirect()->route('sop.request')->with('success','Update Internal Memo');
                }else{
                                    $updatesop = Sop::where('id',$request->id)->update([ 
                                    'boleh_dilihat' => $boleh_dilihat,
                        ]);
                        return redirect()->route('internalmemo.request')->with('success','Update Internal Memo');
                }
            }
        }else{
                        $nomor_sop = IdGenerator::generate(['table' => 'sops', 'length' => 7, 'prefix' =>'SOP/', 'field' => 'nomor_sop']);
                        Sop::create([
                                    'nomor_sop' => $nomor_sop, 
                                    'namasop' => $namasop, 
                                    'disetujui' => $disetujui,
                                    'diperiksa' => $diperiksa,
                                    'tgl_disetujui' => $tgl_disetujui,
                                    'tgl_diperiksa' => $tgl_diperiksa,
                                    'boleh_dilihat' => $boleh_dilihat,
                                    'user_id' => Auth::id(),
                                    'kebijakan_spesifik' => $kebijakan_spesifik,
                                    'tujuan' => $tujuan,
                                    'ketentuan_proses' => $ketentuan_proses,
                        ]);

                    $alurkerja = [];
                    if ($request->alurkerja){
                        foreach($request->alurkerja as $key => $image)
                        {
                            $imageName = time().rand(1,99).'.'.$image->extension();  
                            $image->move(public_path('filesop/alurkerja'), $imageName);
              
                            $alurkerja[] = [
                                    'filename' => $imageName,
                                    'nomor_sop' => $nomor_sop,
                                    'jenis_file' => 'alurkerja',
                                ];
                        }
                    }
                    foreach ($alurkerja as $key => $image) {
                        Filesop::create($image);
                    }

                    $images = [];
                    if ($request->images){
                        foreach($request->images as $key => $image)
                        {
                            $imageName = time().rand(1,99).'.'.$image->extension();  
                            $image->move(public_path('filesop/dokumenpendukung'), $imageName);
              
                            $images[] = [
                                    'filename' => $imageName,
                                    'nomor_sop' => $nomor_sop,
                                    'jenis_file' => 'dokumenpendukung',
                                ];
                        }
                    }
                    foreach ($images as $key => $image) {
                        Filedokumenpendukung::create($image);
                    }

                    return redirect()->route('sop.request')->with('success','Berhasil Membuat Internal Memo.');
        } 
    }

    public function printPreview($id) {
        $item   = UserRequest::findOrFail($id);

        $pdf = PDF::loadView('pages.user.request.print', [
            'item'  =>  $item 
        ]);
        return $pdf->stream();
    }

    public function disetujuiapproved($id)
    {
        $updatememo = Sop::where('id',$id)->first()->update([
                                        'status_disetujui' => 'APPROVED',
                                        'tgl_disetujui' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function disetujuitidakapproved($id)
    {
        $updatememo = Sop::where('id',$id)->first()->update([
                                        'status_disetujui' => 'TIDAK APPROVED',
                                        'tgl_disetujui' => now(),
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
    }

    public function diperiksaapproved($id)
    {
        $updatememo = Sop::where('id',$id)->first()->update([
                                        'status_diperiksa' => 'APPROVED',
                                        'tgl_diperiksa' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function diperiksatidakapproved($id)
    {
        $updatememo = Sop::where('id',$id)->first()->update([
                                            'status_diperiksa' => 'TIDAK APPROVED',
                                            'tgl_diperiksa' => now(),
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
    }


    public function mylistmenyetujui() {
        $data = Sop::where('disetujui', Auth::user()->id)->where('status_diperiksa', '=', 'APPROVED')->orderBy('created_at','desc')->get();
        $datacount = Sop::where('disetujui', Auth::user()->id)->count();

        return view('sop.sop-mylistmenyetujui', compact('data','datacount'));
    }

    public function mylistdiperiksa() {
        $data = Sop::where('diperiksa', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = Sop::where('diperiksa', Auth::user()->id)->count();

        return view('sop.sop-mylistdiperiksa', compact('data','datacount'));
    }

    public function mylistforme() {
        $data = Sop::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_diperiksa', '=', 'APPROVED')->where('status_disetujui', '=', 'APPROVED')->orderBy('created_at','desc')->get();
        $datacount = Sop::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_diperiksa', '=', 'APPROVED')->where('status_disetujui', '=', 'APPROVED')->count();

        return view('sop.sop-mylistforme', compact('data','datacount'));
    }

    public function delete($id)
    {
        $cekmemos =  Sop::where('id','=',$id)->get();

        foreach($cekmemos as $cekmemo){
            if($cekmemo->status_diperiksa == 'BELUM APPROVED'){
                if($cekmemo->status_disetujui == 'BELUM APPROVED') {
                    $deletememo = Sop::where('id','=',$id)->delete();
                    $deletefilememo = Sop::where('nomor_sop','=',$cekmemo->nomor_sop)->delete();
                }
            }
        }
        return back();
        // return response($cekmemo);
    }

   public function updatedisetujui(Request $request)
    {
        $catatan_disetujui = $request->catatan_disetujui;
        $id = $request->id;
        $updatememo = UserRequestmemo::where('id',$id)->update([ 
                                            'catatan_disetujui' => $catatan_disetujui,
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
        // return response($updatememo);
    }

   public function updatediketahui(Request $request)
    {
        $catatan_diketahui = $request->catatan_diketahui;
        $id = $request->id;
        $updatememo = UserRequestmemo::where('id',$id)->update([ 
                                            'catatan_diketahui' => $catatan_diketahui,
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
        // return response($updatememo);
    }
}
