<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Role;


class UserController extends Controller
{
    public function index(Request $request){
        $this->authorize('viewAny', User::class);
        $users=null;
        if($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('email', 'LIKE', '%'.$request->search.'%')
            ->with('role')->get();
        }else{
            $users = User::with('role')->get();
        }

        return view('adm.users',['users'=>$users]);
    }

    public function ban(User $user){
        $user->update([
            'is_active'=>false,
        ]);
        return back();
    }

    public function unban(User $user){
        $user->update([
            'is_active'=>true,
        ]);
        return back();
    }

    public function edit(User $user){
        return view('adm.edituser',['user'=>$user,'roles'=> Role::all(),]);
    }

    public function update(Request $request,User $user){
        $user->update([
            'role_id'=>$request->input('role_id'),
        ]);

        return redirect()->back()->with('message', 'User edited succcessfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('adm.users.index')->with('message', 'User deleted successfully!');
    }
}
