<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;
use App\Models\Nominalsppd;

use App\Http\Requests\Technician\TechAddUserRequest;

use DataTables;

class UserController extends Controller
{
    // public function json(){
    //     $data = User::where('role', 'USER')->with([
    //         'department'
    //     ]);

    //     return DataTables::of($data)
    //     ->addIndexColumn()
    //     ->addColumn('action', function($data){
    //            $btn = '
    //             <a 
    //             href="user/'.$data->id.'/edit" 
    //             class="btn btn-primary btn-sm mb-2" id="">
    //             <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
    //             </a>';

    //             return $btn;
    //     })
    //     ->make(true);
    // }

    public function index() {
        $data = User::orderBy('created_at','desc')->get();
        $departments = Department::all();
        $datacount = User::all()->count();

        return view('user.list', compact('data','departments','datacount'));
    }

    public function listdivisi() {
        $data = User::orderBy('created_at','desc')->get();
        $departments = Department::all();
        $datacount = Department::all()->count();

        return view('user.listdivisi', compact('data','departments','datacount'));
    }

    public function create() {
        $departments = Department::all();

        return view('user.create', [
            'departments'   => $departments
        ]);
    }

    public function store(TechAddUserRequest $request) {
        $data               = $request->except('confirm_password');
        $data['password']   = Hash::make($data['password']);
        $data['role']       = 'USER';
        
        if(User::create($data)) {
            $request->session()->flash('alert-success-add', 'User berhasil ditambahkan');
        }
        return redirect()->route('user.list');
    }

    public function show($id) {

    }

    public function edit($id) {
        $item           = User::findOrFail($id);
        $departments    = Department::all();
        $nominals    = Nominalsppd::all();

        return view('user.edit', [
            'item'          => $item,
            'departments'   => $departments,
            'nominals'   => $nominals,
        ]);
    }

    public function updatename(Request $request) {
        $id = $request->id;
        $username = $request->username;
        $name = $request->name;
        $email = $request->email;
        $level_id = $request->level_id;
        $dept_id = $request->dept_id;
        $nominal_id = $request->nominal_id;
        $posisi = $request->posisi;
        $nik = $request->nik;

                        $updateuser = User::where('id',$request->id)->update([
                                'username' => $username, 
                                'name' => $name, 
                                'email' => $email,
                                'level_id' => $level_id,
                                'dept_id' => $dept_id,
                                'nominal_id' => $nominal_id,
                                'posisi' => $posisi,
                                'nik' => $nik,
                        ]);
        
       return redirect()->route('user.list');
    }

    public function updatedivisi(Request $request) {
        $id = $request->id;
        $name = $request->name;
        $dept_head = $request->dept_head;
        $sect_head = $request->sect_head;
        $bod_head = $request->bod_head;

                        $updateuser = Department::where('id',$request->id)->update([
                                'name' => $name, 
                                'dept_head' => $dept_head,
                                'sect_head' => $sect_head,
                                'bod_head' => $bod_head,
                        ]);
        
       return redirect()->route('user.listdivisi');
    }

    public function editdivisi($id) {
        $departments           = Department::findOrFail($id);
        $users    = User::all();
        $sect_heads    = User::all();
        $dept_heads    = User::all();
        $bod_heads    = User::all();

        return view('user.editdivisi', [
            'departments'          => $departments,
            'users'                => $users,  
            'sect_heads'                => $sect_heads,  
            'dept_heads'                => $dept_heads,  
            'bod_heads'                => $bod_heads  
        ]);
    }
}
