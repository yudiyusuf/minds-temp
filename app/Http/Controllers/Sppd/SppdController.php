<?php

namespace App\Http\Controllers\Sppd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserRequestmemo;
use App\Models\User;
use App\Models\Filememo;
use App\Models\Sppd;
use App\Models\Computer;
use App\Models\BreakType;

use App\Models\FollowedUpRequest;
use App\Models\VerifiedRequest;

use App\Http\Requests\User\RequestRequest;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

use PDF;
use DataTables;

class SppdController extends Controller
{
    public function index() {
        $data = Sppd::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = Sppd::where('user_id', Auth::user()->id)->count();

        return view('sppd.sppd-mylist', compact('data','datacount'));
    }

    public function preview($id) {
        $cekmemos = Sppd::where('id', $id)->get();
        $cekformes = Sppd::where('id', $id)->where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->get();
                if($cekformes != '[]'){
                    $oke = Auth::user()->id;
                }else{
                     $oke = NULL;
                }


        $data = Sppd::findOrFail($id);
            foreach($cekmemos as $cekmemo){
                if($cekmemo->user_id == Auth::user()->id or $cekmemo->penerima_tugas1 == Auth::user()->id or $cekmemo->penerima_tugas2 == Auth::user()->id or $cekmemo->penerima_tugas3 == Auth::user()->id or $cekmemo->penerima_tugas4 == Auth::user()->id or $cekmemo->pemberi_tugas1 == Auth::user()->id or $cekmemo->pemberi_tugas2 == Auth::user()->id or $cekmemo->pemberi_tugas3 == Auth::user()->id or $cekmemo->pemberi_tugas4 == Auth::user()->id or $oke == Auth::user()->id){
                     return view('sppd.sppd-detail', compact('data'));
                }else{
                      return view('errors.403');
                }

            }
                // return response($oke);

    }

    public function edit($id) {
        $cekmemos = Sppd::where('id', $id)->get();

        $data = Sppd::findOrFail($id);
        $users          = User::all();
        $boleh_dilihat = explode(',', $data->boleh_dilihat);
        $selectedss = $data->boleh_dilihat;
            foreach($cekmemos as $cekmemo){
                if($cekmemo->user_id == Auth::user()->id){
                    return view('sppd.sppd-edit', compact(['data','boleh_dilihat','users','selectedss']));
                }else{
                     return view('errors.403');
                }

            }
                // return response($oke);

    }

    public function create() {
        $users          = User::all();
        $computers      = Computer::all();

        return view('sppd.sppd-add', [
            'users'   => $users,
            'computers'     => $computers,
        ]);
    }

    public function store(Request $request) {
        $pekerjaan = $request->pekerjaan;
        $tujuan = $request->tujuan;
        $transportasi = $request->transportasi;
        $penerima_tugas1 = $request->penerima_tugas1;
        $penerima_tugas3 = $request->penerima_tugas3;
        $tgl_berangkats = $request->start;
        $tgl_kembalis = $request->end;
        $boleh_dilihat = implode(', ',$request->boleh_dilihat);
        $penginapan = $request->penginapan;
        $penerima_tugas2 = $request->penerima_tugas2;
        $penerima_tugas4 = $request->penerima_tugas4;
        $biayaoperasional = $request->biayaoperasional;
        $id = $request->id;

        $tgl_berangkat = date('Y-m-d', strtotime($tgl_berangkats));
        $tgl_kembali = date('Y-m-d', strtotime($tgl_kembalis));


        $formatted_dt1=Carbon::parse($tgl_berangkat);
        $formatted_dt2=Carbon::parse($tgl_kembali);
        $jumlah_harinol=$formatted_dt1->diffInDays($formatted_dt2);
        $jumlah_hari= $jumlah_harinol + 1;
        // $jumlah_hari = $tgl_berangkat->diff($tgl_kembali);


        $caripemberitugas1 = User::where('id', $penerima_tugas1)->first();
        if ($caripemberitugas1->level_id == "Officer"){
            if($jumlah_hari < '8'){
                $caripemberitugassatu = $caripemberitugas1->divisi->secthead->id;
                $uangmakan_penerima1 = $jumlah_hari * $caripemberitugas1->nominal->uang_makan;
            }else{
                $caripemberitugassatu = $caripemberitugas1->divisi->secthead->id;
                $uangmakan_penerima1 = $jumlah_hari * 100000;
            }
        }elseif($caripemberitugas1->level_id == "Section Head"){
            if($jumlah_hari < '8'){
                $caripemberitugassatu = $caripemberitugas1->divisi->depthead->id;
                $uangmakan_penerima1 = $jumlah_hari * $caripemberitugas1->nominal->uang_makan;
            }else{
                $caripemberitugassatu = $caripemberitugas1->divisi->depthead->id;
                $uangmakan_penerima1 = $jumlah_hari * 100000;
            }
        }elseif($caripemberitugas1->level_id == "Dept Head"){
            if($jumlah_hari < '8'){
                $caripemberitugassatu = $caripemberitugas1->divisi->bodhead->id;
                $uangmakan_penerima1 = $jumlah_hari * $caripemberitugas1->nominal->uang_makan;
            }else{
                $caripemberitugassatu = $caripemberitugas1->divisi->bodhead->id;
                $uangmakan_penerima1 = $jumlah_hari * 100000;
            }
        }

        if ($penerima_tugas2 != ""){
            $caripemberitugas2 = User::where('id', $penerima_tugas2)->first();
            if ($caripemberitugas2->level_id == "Officer"){
                if($jumlah_hari < '8'){
                    $caripemberitugasdua = $caripemberitugas2->divisi->secthead->id;
                    $uangmakan_penerima2 = $jumlah_hari * $caripemberitugas2->nominal->uang_makan;
                }else{
                    $caripemberitugasdua = $caripemberitugas2->divisi->secthead->id;
                    $uangmakan_penerima2 = $jumlah_hari * 100000;
                }
            }elseif($caripemberitugas2->level_id == "Section Head"){
                if($jumlah_hari < '8'){
                    $caripemberitugasdua = $caripemberitugas2->divisi->depthead->id;
                    $uangmakan_penerima2 = $jumlah_hari * $caripemberitugas2->nominal->uang_makan;
                }else{
                    $caripemberitugasdua = $caripemberitugas2->divisi->depthead->id;
                    $uangmakan_penerima2 = $jumlah_hari * 100000;
                }
            }elseif($caripemberitugas2->level_id == "Dept Head"){
                if($jumlah_hari < '8'){
                    $caripemberitugasdua = $caripemberitugas2->divisi->bodhead->id;
                    $uangmakan_penerima2 = $jumlah_hari * $caripemberitugas2->nominal->uang_makan;
                }else{
                    $caripemberitugasdua = $caripemberitugas2->divisi->bodhead->id;
                    $uangmakan_penerima2 = $jumlah_hari * 100000;
                }
            }
        }else{
            $caripemberitugasdua = $penerima_tugas2;
            $uangmakan_penerima2 = $penerima_tugas2;
        }

        if ($penerima_tugas3 != ""){
            $caripemberitugas3 = User::where('id', $penerima_tugas3)->first();
            if ($caripemberitugas3->level_id == "Officer"){
                if($jumlah_hari < '8'){
                    $caripemberitugastiga = $caripemberitugas3->divisi->secthead->id;
                    $uangmakan_penerima3 = $jumlah_hari * $caripemberitugas3->nominal->uang_makan;
                }else{
                    $caripemberitugastiga = $caripemberitugas3->divisi->secthead->id;
                    $uangmakan_penerima3 = $jumlah_hari * 100000;
                }
            }elseif($caripemberitugas3->level_id == "Section Head"){
                if($jumlah_hari < '8'){
                    $caripemberitugastiga = $caripemberitugas3->divisi->depthead->id;
                    $uangmakan_penerima3 = $jumlah_hari * $caripemberitugas3->nominal->uang_makan;
                }else{
                    $caripemberitugastiga = $caripemberitugas3->divisi->depthead->id;
                    $uangmakan_penerima3 = $jumlah_hari * 100000;
                }
            }elseif($caripemberitugas3->level_id == "Dept Head"){
                if($jumlah_hari < '8'){
                    $caripemberitugastiga = $caripemberitugas3->divisi->bodhead->id;
                    $uangmakan_penerima3 = $jumlah_hari * $caripemberitugas3->nominal->uang_makan;
                }else{
                    $caripemberitugastiga = $caripemberitugas3->divisi->bodhead->id;
                    $uangmakan_penerima3 = $jumlah_hari * 100000;
                }
            }
        }else{
            $caripemberitugastiga = $penerima_tugas3;
            $uangmakan_penerima3 = $penerima_tugas3;
        }

        if ($penerima_tugas4 != ""){
            $caripemberitugas4 = User::where('id', $penerima_tugas4)->first();
            if ($caripemberitugas4->level_id == "Officer"){
                if($jumlah_hari < '8'){
                    $caripemberitugasempat = $caripemberitugas4->divisi->secthead->id;
                    $uangmakan_penerima4 = $jumlah_hari * $caripemberitugas4->nominal->uang_makan;
                }else{
                    $caripemberitugasempat = $caripemberitugas4->divisi->secthead->id;
                    $uangmakan_penerima4 = $jumlah_hari * 100000;
                }
            }elseif($caripemberitugas4->level_id == "Section Head"){
                if($jumlah_hari < '8'){
                    $caripemberitugasempat = $caripemberitugas4->divisi->depthead->id;
                    $uangmakan_penerima4 = $jumlah_hari * $caripemberitugas4->nominal->uang_makan;
                }else{
                    $caripemberitugasempat = $caripemberitugas4->divisi->depthead->id;
                    $uangmakan_penerima4 = $jumlah_hari * 100000;
                }
            }elseif($caripemberitugas4->level_id == "Dept Head"){
                if($jumlah_hari < '8'){
                    $caripemberitugasempat = $caripemberitugas4->divisi->bodhead->id;
                    $uangmakan_penerima4 = $jumlah_hari * $caripemberitugas4->nominal->uang_makan;
                }else{
                    $caripemberitugasempat = $caripemberitugas4->divisi->bodhead->id;
                    $uangmakan_penerima4 = $jumlah_hari * 100000;
                }
            }
        }else{
            $caripemberitugasempat = $penerima_tugas4;
            $uangmakan_penerima4 = $penerima_tugas4;
        }


        $jumlahkota = count(explode(',',$tujuan));

        if($jumlahkota < '2'){
                if($transportasi == 'Mobil'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '2000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasionalnol = 1000000 * $jumlah_harinol;
                        $biaya_operasional = 2000000 + $biaya_operasionalnol;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                } 

                if($transportasi == 'Kereta'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '1000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1000000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }

                if($transportasi == 'Pesawat'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '1000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1000000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }
        }else{
                if($transportasi == 'Mobil'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '2000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasionalnol = 1500000 * $jumlah_harinol;
                        $biaya_operasional = 2000000 + $biaya_operasionalnol;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                } 

                if($transportasi == 'Kereta'){
                    if($jumlah_hari < '2'){
                        $biaya_operasional = '1500000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1500000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }

                if($transportasi == 'Pesawat'){
                    if($jumlah_hari < '2'){
                        $biaya_operasional = '1000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1500000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }
        }


        if($biaya_operasional > '5000000'){
            $biaya_operasional = 5000000;
        }


        $cekdiketahuis = Sppd::where('id', $id)->get();
        $idmemo = Sppd::find($id);
        if($idmemo){
            foreach($cekdiketahuis as $cekdiketahui){
                if($cekdiketahui->status_mengetahui == 'BELUM APPROVED'){
                        $updatememo = Sppd::where('id',$request->id)->update([
                                'pekerjaan' => $pekerjaan, 
                                'tujuan' => $tujuan, 
                                'transportasi' => $transportasi,
                                'penerima_tugas1' => $penerima_tugas1,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas3' => $penerima_tugas3,
                                'penerima_tugas4' => $penerima_tugas4,
                                'tgl_berangkat' => $tgl_berangkat,
                                'tgl_kembali' => $tgl_kembali,
                                'jumlah_hari' => $jumlah_hari,
                                'boleh_dilihat' => $boleh_dilihat,
                                'penginapan' => $penginapan,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas4' => $penerima_tugas4,
                                'pemberi_tugas1' => $caripemberitugassatu,
                                'pemberi_tugas2' => $caripemberitugasdua,
                                'pemberi_tugas3' => $caripemberitugastiga,
                                'pemberi_tugas4' => $caripemberitugasempat,
                                'biaya_operasional' => $biayaoperasional,
                                'uangmakan_penerima1' => $uangmakan_penerima1,
                                'uangmakan_penerima2' => $uangmakan_penerima2,
                                'uangmakan_penerima3' => $uangmakan_penerima3,
                                'uangmakan_penerima4' => $uangmakan_penerima4,
                                'mengetahui_id' => 24,
                                'user_id' => Auth::id()
                        ]);
                         return redirect()->route('sppd.request')->with('success','Berhasil Membuat SPPD.');
                }else{
                                    $updatememo = Sppd::where('id',$request->id)->update([ 
                                    'boleh_dilihat' => $boleh_dilihat,
                        ]);
                         return redirect()->route('sppd.request')->with('success','Berhasil Membuat SPPD.');
                }
            }
        }else{
                        $nomor_sppd = IdGenerator::generate(['table' => 'sppds', 'length' => 8, 'prefix' =>'SPPD/', 'field' => 'nomor_sppd']);
                        Sppd::create([
                                'nomor_sppd' => $nomor_sppd, 
                                'pekerjaan' => $pekerjaan, 
                                'tujuan' => $tujuan, 
                                'transportasi' => $transportasi,
                                'penerima_tugas1' => $penerima_tugas1,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas3' => $penerima_tugas3,
                                'penerima_tugas4' => $penerima_tugas4,
                                'tgl_berangkat' => $tgl_berangkat,
                                'tgl_kembali' => $tgl_kembali,
                                'jumlah_hari' => $jumlah_hari,
                                'boleh_dilihat' => $boleh_dilihat,
                                'penginapan' => $penginapan,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas4' => $penerima_tugas4,
                                'pemberi_tugas1' => $caripemberitugassatu,
                                'pemberi_tugas2' => $caripemberitugasdua,
                                'pemberi_tugas3' => $caripemberitugastiga,
                                'pemberi_tugas4' => $caripemberitugasempat,
                                'biaya_operasional' => $biaya_operasional,
                                'uangmakan_penerima1' => $uangmakan_penerima1,
                                'uangmakan_penerima2' => $uangmakan_penerima2,
                                'uangmakan_penerima3' => $uangmakan_penerima3,
                                'uangmakan_penerima4' => $uangmakan_penerima4,
                                'mengetahui_id' => 24,
                                'user_id' => Auth::id()
                        ]);

                    return redirect()->route('sppd.request')->with('success','Berhasil Membuat SPPD.');
        } 

         // return response($cekdiketahuis);

    }

    public function printPreview($id) {
        $item   = UserRequest::findOrFail($id);

        $pdf = PDF::loadView('pages.user.request.print', [
            'item'  =>  $item 
        ]);
        return $pdf->stream();
    }

    public function penerimatugassatu($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_penerima_tugas1' => 'APPROVED',
                                        'tgl_diterimatugas1' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function penerimatugasdua($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_penerima_tugas2' => 'APPROVED',
                                        'tgl_diterimatugas2' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function penerimatugastiga($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_penerima_tugas3' => 'APPROVED',
                                        'tgl_diterimatugas3' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function penerimatugasempat($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_penerima_tugas4' => 'APPROVED',
                                        'tgl_diterimatugas4' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function pemberitugassatu($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_pemberi_tugas1' => 'APPROVED',
                                        'tgl_pemberitugas1' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function pemberitugasdua($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_pemberi_tugas2' => 'APPROVED',
                                        'tgl_pemberitugas2' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function pemberitugastiga($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_pemberi_tugas3' => 'APPROVED',
                                        'tgl_pemberitugas3' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function pemberitugasempat($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_pemberi_tugas4' => 'APPROVED',
                                        'tgl_pemberitugas4' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function mengetahui($id)
    {
        $updatememo = Sppd::where('id',$id)->first()->update([
                                        'status_mengetahui' => 'APPROVED',
                                        'tgl_mengetahui' => now(),
                                    ]);
        return back()->with('success',__('message.approved'));
    }

    public function penerima() {
        $data = Sppd::where('penerima_tugas1', Auth::user()->id)->orwhere('penerima_tugas2', Auth::user()->id)->orwhere('penerima_tugas3', Auth::user()->id)->orwhere('penerima_tugas4', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = Sppd::where('penerima_tugas1', Auth::user()->id)->orwhere('penerima_tugas2', Auth::user()->id)->orwhere('penerima_tugas3', Auth::user()->id)->orwhere('penerima_tugas4', Auth::user()->id)->count();

        return view('sppd.sppd-mylistpenerima', compact('data','datacount'));
    }

    public function pemberi() {
        $data = Sppd::where('pemberi_tugas1', Auth::user()->id)->orwhere('pemberi_tugas2', Auth::user()->id)->orwhere('pemberi_tugas3', Auth::user()->id)->orwhere('pemberi_tugas4', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = Sppd::where('pemberi_tugas1', Auth::user()->id)->orwhere('pemberi_tugas2', Auth::user()->id)->orwhere('pemberi_tugas3', Auth::user()->id)->orwhere('pemberi_tugas4', Auth::user()->id)->count();

        return view('sppd.sppd-mylistpemberi', compact('data','datacount'));
    }

    public function mylistforme() {
        $data = Sppd::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_penerima_tugas1', '=', 'APPROVED')->where('status_pemberi_tugas1', '=', 'APPROVED')->orderBy('created_at','desc')->get();
        $datacount = Sppd::where('boleh_dilihat', 'like', '%' .Auth::user()->name. '%')->where('status_penerima_tugas1', '=', 'APPROVED')->where('status_pemberi_tugas1', '=', 'APPROVED')->count();

        return view('sppd.sppd-mylistforme', compact('data','datacount'));
    }

    public function diketahui() {
        $data = Sppd::where('mengetahui_id', Auth::user()->id)->orderBy('created_at','desc')->get();
        $datacount = Sppd::where('mengetahui_id', Auth::user()->id)->count();

        return view('sppd.sppd-mylistdiketahui', compact('data','datacount'));
    }

    public function delete($id)
    {
        $ceksppds =  Sppd::where('id','=',$id)->get();

        foreach($ceksppds as $ceksppd){
            if($ceksppd->status_mengetahui == 'BELUM APPROVED'){
                    $deletememo = Sppd::where('id','=',$id)->delete();
            }
        }
        return back();
        // return response($cekmemo);
    }

    public function updatesppd(Request $request) {
        $pekerjaan = $request->pekerjaan;
        $tujuan = $request->tujuan;
        $transportasi = $request->transportasi;
        $penerima_tugas1 = $request->penerima_tugas1;
        $penerima_tugas3 = $request->penerima_tugas3;
        $tgl_berangkats = $request->start;
        $tgl_kembalis = $request->end;
        $boleh_dilihat = implode(', ',$request->boleh_dilihat);
        $penginapan = $request->penginapan;
        $penerima_tugas2 = $request->penerima_tugas2;
        $penerima_tugas4 = $request->penerima_tugas4;
        $biayaoperasional = $request->biayaoperasional;
        $id = $request->id;

        $tgl_berangkat = date('Y-m-d', strtotime($tgl_berangkats));
        $tgl_kembali = date('Y-m-d', strtotime($tgl_kembalis));


        $formatted_dt1=Carbon::parse($tgl_berangkat);
        $formatted_dt2=Carbon::parse($tgl_kembali);
        $jumlah_harinol=$formatted_dt1->diffInDays($formatted_dt2);
        $jumlah_hari= $jumlah_harinol + 1;
        // $jumlah_hari = $tgl_berangkat->diff($tgl_kembali);


        $caripemberitugas1 = User::where('id', $penerima_tugas1)->first();
        if ($caripemberitugas1->level_id == "Officer"){
            $caripemberitugassatu = $caripemberitugas1->divisi->secthead->id;
            $uangmakan_penerima1 = $jumlah_hari * $caripemberitugas1->nominal->uang_makan;
        }elseif($caripemberitugas1->level_id == "Section Head"){
            $caripemberitugassatu = $caripemberitugas1->divisi->depthead->id;
            $uangmakan_penerima1 = $jumlah_hari * $caripemberitugas1->nominal->uang_makan;
        }elseif($caripemberitugas1->level_id == "Dept Head"){
            $caripemberitugassatu = $caripemberitugas1->divisi->bodhead->id;
            $uangmakan_penerima1 = $jumlah_hari * $caripemberitugas1->nominal->uang_makan;
        }

        if ($penerima_tugas2 != ""){
            $caripemberitugas2 = User::where('id', $penerima_tugas2)->first();
            if ($caripemberitugas2->level_id == "Officer"){
                $caripemberitugasdua = $caripemberitugas2->divisi->secthead->id;
                $uangmakan_penerima2 = $jumlah_hari * $caripemberitugas2->nominal->uang_makan;
            }elseif($caripemberitugas2->level_id == "Section Head"){
                $caripemberitugasdua = $caripemberitugas2->divisi->depthead->id;
                $uangmakan_penerima2 = $jumlah_hari * $caripemberitugas2->nominal->uang_makan;
            }elseif($caripemberitugas2->level_id == "Dept Head"){
                $caripemberitugasdua = $caripemberitugas2->divisi->bodhead->id;
                $uangmakan_penerima2 = $jumlah_hari * $caripemberitugas2->nominal->uang_makan;
            }
        }else{
            $caripemberitugasdua = $penerima_tugas2;
            $uangmakan_penerima2 = $penerima_tugas2;
        }

        if ($penerima_tugas3 != ""){
            $caripemberitugas3 = User::where('id', $penerima_tugas3)->first();
            if ($caripemberitugas3->level_id == "Officer"){
                $caripemberitugastiga = $caripemberitugas3->divisi->secthead->id;
                $uangmakan_penerima3 = $jumlah_hari * $caripemberitugas3->nominal->uang_makan;
            }elseif($caripemberitugas3->level_id == "Section Head"){
                $caripemberitugastiga = $caripemberitugas3->divisi->depthead->id;
                $uangmakan_penerima3 = $jumlah_hari * $caripemberitugas3->nominal->uang_makan;
            }elseif($caripemberitugas3->level_id == "Dept Head"){
                $caripemberitugastiga = $caripemberitugas3->divisi->bodhead->id;
                $uangmakan_penerima3 = $jumlah_hari * $caripemberitugas3->nominal->uang_makan;
            }
        }else{
            $caripemberitugastiga = $penerima_tugas3;
            $uangmakan_penerima3 = $penerima_tugas3;
        }

        if ($penerima_tugas4 != ""){
            $caripemberitugas4 = User::where('id', $penerima_tugas4)->first();
            if ($caripemberitugas4->level_id == "Officer"){
                $caripemberitugasempat = $caripemberitugas4->divisi->secthead->id;
                $uangmakan_penerima4 = $jumlah_hari * $caripemberitugas4->nominal->uang_makan;
            }elseif($caripemberitugas4->level_id == "Section Head"){
                $caripemberitugasempat = $caripemberitugas4->divisi->depthead->id;
                $uangmakan_penerima4 = $jumlah_hari * $caripemberitugas4->nominal->uang_makan;
            }elseif($caripemberitugas4->level_id == "Dept Head"){
                $caripemberitugasempat = $caripemberitugas4->divisi->bodhead->id;
                $uangmakan_penerima4 = $jumlah_hari * $caripemberitugas4->nominal->uang_makan;
            }
        }else{
            $caripemberitugasempat = $penerima_tugas4;
            $uangmakan_penerima4 = $penerima_tugas4;
        }


        $jumlahkota = count(explode(',',$tujuan));

        if($jumlahkota < '2'){
                if($transportasi == 'Mobil'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '2000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasionalnol = 1000000 * $jumlah_harinol;
                        $biaya_operasional = 2000000 + $biaya_operasionalnol;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                } 

                if($transportasi == 'Kereta'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '1000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1000000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }

                if($transportasi == 'Pesawat'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '1000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1000000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }
        }else{
                if($transportasi == 'Mobil'){
                    if($jumlah_hari == '1'){
                        $biaya_operasional = '2000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasionalnol = 1500000 * $jumlah_harinol;
                        $biaya_operasional = 2000000 + $biaya_operasionalnol;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                } 

                if($transportasi == 'Kereta'){
                    if($jumlah_hari < '2'){
                        $biaya_operasional = '1500000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1500000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }

                if($transportasi == 'Pesawat'){
                    if($jumlah_hari < '2'){
                        $biaya_operasional = '1000000';
                    }
                    elseif($jumlah_hari < '6'){
                        $biaya_operasional = 1500000 * $jumlah_hari;
                    }
                    else{
                        $biaya_operasional = 5000000;
                    }
                }
        }


        if($biaya_operasional > '5000000'){
            $biaya_operasional = 5000000;
        }


        $cekdiketahuis = Sppd::where('id', $id)->get();
        $idmemo = Sppd::find($id);
        if($idmemo){
            foreach($cekdiketahuis as $cekdiketahui){
                if($cekdiketahui->status_mengetahui == 'BELUM APPROVED'){
                        $updatememo = Sppd::where('id',$request->id)->update([
                                'pekerjaan' => $pekerjaan, 
                                'tujuan' => $tujuan, 
                                'transportasi' => $transportasi,
                                'penerima_tugas1' => $penerima_tugas1,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas3' => $penerima_tugas3,
                                'penerima_tugas4' => $penerima_tugas4,
                                'tgl_berangkat' => $tgl_berangkat,
                                'tgl_kembali' => $tgl_kembali,
                                'jumlah_hari' => $jumlah_hari,
                                'boleh_dilihat' => $boleh_dilihat,
                                'penginapan' => $penginapan,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas4' => $penerima_tugas4,
                                'pemberi_tugas1' => $caripemberitugassatu,
                                'pemberi_tugas2' => $caripemberitugasdua,
                                'pemberi_tugas3' => $caripemberitugastiga,
                                'pemberi_tugas4' => $caripemberitugasempat,
                                'biaya_operasional' => $biayaoperasional,
                                'uangmakan_penerima1' => $uangmakan_penerima1,
                                'uangmakan_penerima2' => $uangmakan_penerima2,
                                'uangmakan_penerima3' => $uangmakan_penerima3,
                                'uangmakan_penerima4' => $uangmakan_penerima4,
                                'mengetahui_id' => 23,
                                'user_id' => Auth::id()
                        ]);
                         return redirect()->route('sppd.request')->with('success','Berhasil Membuat SPPD.');
                }else{
                                    $updatememo = Sppd::where('id',$request->id)->update([ 
                                    'boleh_dilihat' => $boleh_dilihat,
                        ]);
                         return redirect()->route('sppd.request')->with('success','Berhasil Membuat SPPD.');
                }
            }
        }else{
                        $nomor_sppd = IdGenerator::generate(['table' => 'sppds', 'length' => 8, 'prefix' =>'SPPD/', 'field' => 'nomor_sppd']);
                        Sppd::create([
                                'nomor_sppd' => $nomor_sppd, 
                                'pekerjaan' => $pekerjaan, 
                                'tujuan' => $tujuan, 
                                'transportasi' => $transportasi,
                                'penerima_tugas1' => $penerima_tugas1,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas3' => $penerima_tugas3,
                                'penerima_tugas4' => $penerima_tugas4,
                                'tgl_berangkat' => $tgl_berangkat,
                                'tgl_kembali' => $tgl_kembali,
                                'jumlah_hari' => $jumlah_hari,
                                'boleh_dilihat' => $boleh_dilihat,
                                'penginapan' => $penginapan,
                                'penerima_tugas2' => $penerima_tugas2,
                                'penerima_tugas4' => $penerima_tugas4,
                                'pemberi_tugas1' => $caripemberitugassatu,
                                'pemberi_tugas2' => $caripemberitugasdua,
                                'pemberi_tugas3' => $caripemberitugastiga,
                                'pemberi_tugas4' => $caripemberitugasempat,
                                'biaya_operasional' => $biaya_operasional,
                                'uangmakan_penerima1' => $uangmakan_penerima1,
                                'uangmakan_penerima2' => $uangmakan_penerima2,
                                'uangmakan_penerima3' => $uangmakan_penerima3,
                                'uangmakan_penerima4' => $uangmakan_penerima4,
                                'mengetahui_id' => 23,
                                'user_id' => Auth::id()
                        ]);

                    return redirect()->route('sppd.request')->with('success','Berhasil Membuat SPPD.');
        } 

         // return response($cekdiketahuis);

    }
}
