<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProfileRepository; 

class ProfileController extends Controller
{
    public $profileRepo;
    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepo=$profileRepo;
    }

    public function userProfile()
    {
        $userData=$this->profileRepo->getUserData();
        return view('auth.profile.index',compact('userData'));
    }

    public function  userUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|min:10',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required_with:password'
            ]);
        $data=$this->profileRepo->updateUser($request);
        if($data){
            return redirect()->route('user.profile')->with('message','Profile updated Successfully');
        }
    }
}
