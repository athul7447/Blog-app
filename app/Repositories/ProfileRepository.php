<?php
 namespace App\Repositories;
 use Illuminate\Support\Facades\Auth;
 use App\Models\User;
 use Illuminate\Support\Facades\Hash;
class ProfileRepository 
{

    public function getUserData()
    {
        $user=User::findorfail(Auth::user()->id);
        return $user;
    }

    public function updateUser($request)
    {
        $user=User::findorfail(Auth::user()->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->password=Hash::make($request->password);
        $user->save();
        return true;
    }
}
