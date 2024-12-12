<?php

namespace App\Http\Controllers\Internalmemo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequestmemo;
use App\Models\User;
use App\Models\Filememo;
use App\Models\Computer;
use App\Models\BreakType;

use App\Models\FollowedUpRequest;
use App\Models\VerifiedRequest;

use App\Http\Requests\User\RequestRequest;

use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use PDF;
use DataTables;

class RequestController extends Controller
{
    public function index() {
        $data = UserRequestmemo::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = UserRequestmemo::where('user_id', Auth::user()->id)->count();

        return view('internalmemo.internal-memo-mylist', compact('data','datacount'));
    }

    public function preview($id) {
        $cekmemos = UserRequestmemo::where('id', $id)->get();
        $cekformes = UserRequestmemo::where('id', $id)->where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->get();
                if($cekformes != '[]'){
                    $oke = Auth::user()->id;
                }else{
                     $oke = NULL;
                }


        $data = UserRequestmemo::findOrFail($id);
            foreach($cekmemos as $cekmemo){
                if($cekmemo->user_id == Auth::user()->id or $cekmemo->disetujui == Auth::user()->id or $cekmemo->diketahui == Auth::user()->id or $cekmemo->disetujui2 == Auth::user()->id or $cekmemo->diketahui2 == Auth::user()->id or $oke == Auth::user()->id){
                     return view('internalmemo.internal-memo-detail', compact('data'));
                }else{
                     return view('errors.403');
                }

            }
                // return response($oke);

    }

    public function edit($id) {
        $cekmemos = UserRequestmemo::where('id', $id)->get();

        $data = UserRequestmemo::findOrFail($id);
        $users          = User::all();
        $computers      = Computer::all();
        $boleh_dilihat = explode(',', $data->boleh_dilihat);
        $selectedss = $data->boleh_dilihat;
            foreach($cekmemos as $cekmemo){
                if($cekmemo->user_id == Auth::user()->id){
                    return view('internalmemo.internal-memo-edit', compact(['data','users','computers','boleh_dilihat','selectedss']));
                }else{
                     return view('errors.403');
                }

            }
                // return response($oke);

    }

    public function create() {
        $users          = User::all();
        $computers      = Computer::all();

        return view('internalmemo.internal-memo-add', [
            'users'   => $users,
            'computers'     => $computers,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $memoname = $request->memoname;
        $jenis_internalmemo = $request->jenis_internalmemo;
        $disetujui = $request->disetujui;
        $diketahui = $request->diketahui;
        $disetujui2 = $request->disetujui2;
        $diketahui2 = $request->diketahui2;
        $boleh_dilihat = implode(', ',$request->boleh_dilihat);
        $memodesc = $request->memodesc;
        $nominal = $request->nominal;
        $tgl_disetujui = $request->tgl_disetujui;
        $tgl_diketahui = $request->tgl_diketahui;
        $tgl_disetujui2 = $request->tgl_disetujui2;
        $tgl_diketahui2 = $request->tgl_diketahui2;
        $id = $request->id;


        $cekdiketahuis = UserRequestmemo::where('id', $id)->get();
        $idmemo = UserRequestmemo::find($id);
        if($idmemo){
            foreach($cekdiketahuis as $cekdiketahui){
                if($cekdiketahui->status_diketahui == 'BELUM APPROVED'){
                        $updatememo = UserRequestmemo::where('id',$request->id)->update([
                                    'memoname' => $memoname, 
                                    'jenis_internalmemo' => $jenis_internalmemo, 
                                    'disetujui' => $disetujui,
                                    'diketahui' => $diketahui,
                                    'disetujui2' => $disetujui2,
                                    'diketahui2' => $diketahui2,
                                    'tgl_disetujui' => $tgl_disetujui,
                                    'tgl_diketahui' => $tgl_diketahui,
                                    'tgl_disetujui2' => $tgl_disetujui2,
                                    'tgl_diketahui2' => $tgl_diketahui2,  
                                    'boleh_dilihat' => $boleh_dilihat,
                                    'memodesc' => $memodesc,
                                    'user_id' => Auth::id(),
                                    'nominal' => $nominal,
                        ]);

                        $images = [];
                        if ($request->images){
                            foreach($request->images as $key => $image)
                            {
                                $imageName = time().rand(1,99).'.'.$image->extension();  
                                $image->move(public_path('filememo/images'), $imageName);
                  
                                $images[] = [
                                        'filename' => $imageName,
                                        'nomor_internalmemo' => $cekdiketahui->nomor_internalmemo,
                                    ];
                            }
                        }
                        foreach ($images as $key => $image) {
                            $deletefilememo = Filememo::where('nomor_internalmemo',$cekdiketahui->nomor_internalmemo)->delete();
                            Filememo::create($image);
                        }
                        return redirect()->route('internalmemo.request')->with('success','Update Internal Memo');
                }else{
                                    $updatememo = UserRequestmemo::where('id',$request->id)->update([ 
                                    'boleh_dilihat' => $boleh_dilihat,
                        ]);
                        return redirect()->route('internalmemo.request')->with('success','Update Internal Memo');
                }
            }
        }else{
                        $nomor_internalmemo = IdGenerator::generate(['table' => 'requestmemos', 'length' => 8, 'prefix' =>'IM/', 'field' => 'nomor_internalmemo']);
                        UserRequestmemo::create([
                                'nomor_internalmemo' => $nomor_internalmemo, 
                                'memoname' => $memoname, 
                                'jenis_internalmemo' => $jenis_internalmemo, 
                                'disetujui' => $disetujui,
                                'diketahui' => $diketahui,
                                'disetujui2' => $disetujui2,
                                'diketahui2' => $diketahui2,
                                'tgl_disetujui' => $tgl_disetujui,
                                'tgl_diketahui' => $tgl_diketahui,
                                'tgl_disetujui2' => $tgl_disetujui2,
                                'tgl_diketahui2' => $tgl_diketahui2,  
                                'boleh_dilihat' => $boleh_dilihat,
                                'memodesc' => $memodesc,
                                'user_id' => Auth::id(),
                                'nominal' => $nominal
                        ]);

                    $images = [];
                    if ($request->images){
                        foreach($request->images as $key => $image)
                        {
                            $imageName = time().rand(1,99).'.'.$image->extension();  
                            $image->move(public_path('filememo/images'), $imageName);
              
                            $images[] = [
                                    'filename' => $imageName,
                                    'nomor_internalmemo' => $nomor_internalmemo,

                                ];
                        }
                    }
                    foreach ($images as $key => $image) {
                        Filememo::create($image);
                    }

                    return redirect()->route('internalmemo.request')->with('success','Berhasil Membuat Internal Memo.');
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
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                        'status_disetujui' => 'APPROVED',
                                        'tgl_disetujui' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function disetujuitidakapproved($id)
    {
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                        'status_disetujui' => 'TIDAK APPROVED',
                                        'tgl_disetujui' => now(),
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
    }

    public function diketahuiapproved($id)
    {
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                        'status_diketahui' => 'APPROVED',
                                        'tgl_diketahui' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function diketahuitidakapproved($id)
    {
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                            'status_diketahui' => 'TIDAK APPROVED',
                                            'tgl_diketahui' => now(),
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
    }

    public function disetujuiapproved2($id)
    {
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                        'status_disetujui2' => 'APPROVED',
                                        'tgl_disetujui2' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function disetujuitidakapproved2($id)
    {
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                        'status_disetujui2' => 'TIDAK APPROVED',
                                        'tgl_disetujui2' => now(),
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
    }

    public function diketahuiapproved2($id)
    {
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                        'status_diketahui2' => 'APPROVED',
                                        'tgl_diketahui2' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function diketahuitidakapproved2($id)
    {
        $updatememo = UserRequestmemo::where('id',$id)->first()->update([
                                            'status_diketahui2' => 'TIDAK APPROVED',
                                            'tgl_diketahui2' => now(),
                                        ]);
        return back()->with('success',__('message.tidakapproved'));
    }

    public function mylistmenyetujui() {
        $data = UserRequestmemo::where('disetujui', Auth::user()->id)->orwhere('disetujui2', Auth::user()->id)->where('status_diketahui', '=', 'APPROVED')->orderBy('created_at','desc')->get();
        $datacount = UserRequestmemo::where('disetujui', Auth::user()->id)->count();

        return view('internalmemo.internal-memo-mylistmenyetujui', compact('data','datacount'));
    }

    public function mylistmengetahui() {
        $data = UserRequestmemo::where('diketahui', Auth::user()->id)->orwhere('diketahui2', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = UserRequestmemo::where('diketahui', Auth::user()->id)->count();

        return view('internalmemo.internal-memo-mylistmengetahui', compact('data','datacount'));
    }

    public function mylistforme() {
        $data = UserRequestmemo::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_diketahui', '=', 'APPROVED')->where('status_disetujui', '=', 'APPROVED')->orderBy('created_at','desc')->get();
        $datacount = UserRequestmemo::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_diketahui', '=', 'APPROVED')->where('status_disetujui', '=', 'APPROVED')->count();

        return view('internalmemo.internal-memo-mylistforme', compact('data','datacount'));
    }

    public function delete($id)
    {
        $cekmemos =  UserRequestmemo::where('id','=',$id)->get();

        foreach($cekmemos as $cekmemo){
            if($cekmemo->status_diketahui == 'BELUM APPROVED'){
                if($cekmemo->status_disetujui == 'BELUM APPROVED') {
                    $deletememo = UserRequestmemo::where('id','=',$id)->delete();
                    $deletefilememo = Filememo::where('nomor_internalmemo','=',$cekmemo->nomor_internalmemo)->delete();
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
