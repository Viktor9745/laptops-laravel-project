<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(Request $request){
        $roles=null;
        if($request->search){
            $roles = Role::where('name', 'LIKE', '%'.$request->search.'%')->get();
        }else{
            $roles = Role::get();
        }

        return view('adm.roles',['roles'=>$roles]);
    }

    public function create()
    {
        return view('adm.createrole');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);
        Role::create($validated);
        return redirect()->route('adm.roles.index')->with('message', 'Role created successfully!');
    }

    public function edit(role $role){
        return view('adm.editrole',['role'=>$role]);
    }

    public function update(Request $request,role $role){
        $Role->update([
            'name'=>$request->input('name'),
        ]);

        return redirect()->route('adm.roles.index')->with('message', 'Role edited succcessfully!');
    }

    public function destroy(Role $Role)
    {
        $Role->delete();
        return redirect()->route('adm.roles.index')->with('message', 'Role deleted successfully!');
    }
}
