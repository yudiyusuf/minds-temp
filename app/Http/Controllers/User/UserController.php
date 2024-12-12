<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;

use App\Http\Requests\Technician\TechAddUserRequest;

use DataTables;

class UserController extends Controller
{
    public function json(){
        $data = User::where('role', 'USER')->with([
            'department'
        ]);

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function($data){
               $btn = '
                <a 
                href="user/'.$data->id.'/edit" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                </a>';

                return $btn;
        })
        ->make(true);
    }

    public function index() {
        return view('pages.technician.user.list');
    }

    public function listdivisi() {
        return view('pages.technician.user.list');
    }

    public function create() {
        $departments = Department::all();

        return view('pages.technician.user.create', [
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
        return redirect()->route('user.index');
    }

    public function show($id) {

    }

    public function edit($id) {
        $item           = User::findOrFail($id);
        $departments    = Department::all();

        return view('pages.technician.user.edit', [
            'item'          => $item,
            'departments'   => $departments  
        ]);
    }

    // public function update(TechAddUserRequest $request, $id) {
    //     $data = $request->except('username');
    //     $item = User::findOrFail($id);

    //     if($item->update($data)) {
    //         $request->session()->flash('alert-success-update', 'User berhasil diupdate');
    //     }
        
    //     return redirect()->route('user.index');
    // }

    public function destroy($id) {
        
    }

    public function update($id)
    {
        $category = User::find($id);

        return response()->json([
          'data' => $category
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return response()->json([
                'isSuccess' => false,
                'Message' => "Your Current password does not matches with the password you provided. Please try again."
            ], 200); // Status code
        } else {
            $user = User::find($id);
            $user->password = Hash::make($request->get('password'));
            $user->update();
            if ($user) {
                Session::flash('message', 'Password updated successfully!');
                Session::flash('alert-class', 'alert-success');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Password updated successfully!"
                ], 200); // Status code here
            } else {
                Session::flash('message', 'Something went wrong!');
                Session::flash('alert-class', 'alert-danger');
                return response()->json([
                    'isSuccess' => true,
                    'Message' => "Something went wrong!"
                ], 200); // Status code here
            }
        }
    }
}
