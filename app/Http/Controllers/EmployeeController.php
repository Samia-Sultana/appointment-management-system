<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index(){

        $this->authorize('viewAny', User::class);
        $roles = Role::all();
        return view('admin.createEmployee', compact('roles'));
    }
    public function create(Request $request){
        
        $this->authorize('create', User::class);
        $all = $request->all();
        $user = User::create([
            'name' => $all['name'],
            'email' => $all['email'],
            'password' => Hash::make($all['password']),
            'role_id' => $all['role'],
        ]);
       

        return redirect()->route('admin.employeePage');
    }
    
}
