<?php

namespace App\Http\Controllers\Internalmemo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequestmemo;
use App\Models\User;
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
        $data = UserRequestmemo::findOrFail($id);

        return view('internalmemo.internal-memo-detail', compact('data'));
    }

    public function create() {
        $users          = User::all();
        $computers      = Computer::all();

        return view('internalmemo.internal-memo-add', [
            'users'   => $users,
            'computers'     => $computers,
        ]);
    }

    public function store() {
        // $data = $request->except(['client_name','dept_code']);
        $memoname = request()->memoname;
        $jenis_internalmemo = request()->jenis_internalmemo;
        $disetujui = request()->disetujui;
        $diketahui = request()->diketahui;
        $disetujui2 = request()->disetujui2;
        $diketahui2 = request()->diketahui2;
        $boleh_dilihat = implode(', ',request()->boleh_dilihat);
        $memodesc = request()->memodesc;
        $nominal = request()->nominal;
        $tgl_disetujui = request()->tgl_disetujui;
        $tgl_diketahui = request()->tgl_diketahui;
        $tgl_disetujui2 = request()->tgl_disetujui2;
        $tgl_diketahui2 = request()->tgl_diketahui2;

        // // get latest request id and store it to requests table 
        // $latest_request_id = UserRequestmemo::create($data)->id;

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


        if($nomor_internalmemo != null){
            // store latest request id to followed up requests table 
            $latest_followed_up_request_id = FollowedUpRequest::create([
                                            'request_id'    => $nomor_internalmemo
                                            ])->id;

            if($latest_followed_up_request_id != null) {
                // store latest followed up request id to verified requests table and set it to BELUM TTD
                $store_it_to_verified_req = VerifiedRequest::create([
                    'followed_up_request_id'    => $latest_followed_up_request_id 
                ]);

                if($store_it_to_verified_req) {
                    // $request->session()->flash('alert-success-add', 'Request berhasil ditambahkan');   
                }
            }
        }

        return redirect()->route('internalmemo.request'); 
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
        $data = UserRequestmemo::where('disetujui', Auth::user()->id)->orwhere('disetujui', Auth::user()->id)->where('status_diketahui', '=', 'APPROVED')->where('status_diketahui2', '=', 'APPROVED')->orderBy('created_at','desc')->get();
        $datacount = UserRequestmemo::where('disetujui', Auth::user()->id)->count();

        return view('internalmemo.internal-memo-mylistmenyetujui', compact('data','datacount'));
    }

    public function mylistmengetahui() {
        $data = UserRequestmemo::where('diketahui', Auth::user()->id)->orwhere('diketahui2', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = UserRequestmemo::where('diketahui', Auth::user()->id)->count();

        return view('internalmemo.internal-memo-mylistmengetahui', compact('data','datacount'));
    }

    public function mylistforme() {
        $data = UserRequestmemo::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_diketahui', '=', 'APPROVED')->where('status_diketahui2', '=', 'APPROVED')->where('status_disetujui', '=', 'APPROVED')->where('status_disetujui2', '=', 'APPROVED')->orderBy('created_at','desc')->get();
        $datacount = UserRequestmemo::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_diketahui', '=', 'APPROVED')->where('status_disetujui', '=', 'APPROVED')->count();

        return view('internalmemo.internal-memo-mylistforme', compact('data','datacount'));
    }
}
