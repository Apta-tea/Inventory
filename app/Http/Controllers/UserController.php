<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\countrys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        
    }

    public function profile()
    {
        $data['user'] = User::find(Auth::user()->id);
        $data['_view'] = 'Admin.Profile.index';
        return view('Layout.body',$data);
    }

    public function profile_edit($id)
    {
        $data['user'] = User::find($id);
        $data['country'] = countrys::pluck('country','id');
        $data['_view'] = 'Admin.Profile.form';
        return view('Layout.body',$data);
    }

    public function profile_update(Request $request, $id)
    {
        if (empty($request->password) && empty($request->file())){
            $data = $request->except('password');
            $user = User::find($id);
            $user->update($data);
            return redirect('profile');
        }elseif (!empty($request->password) && !empty($request->file())) {
            $password = Hash::make($request->password);
            $name = $request->file('file_picture')->getClientOriginalName();
            $path = $request->file('file_picture')->move(public_path().'/assets/',$name);
            $data1 = $request->except('password');
            $user = User::find($id);
            $user->update($data1);
            $data2 = array(
                'password' => $password,
                'file_picture' => $name,
            );
            $user->update($data2);
            return redirect('profile');
        }elseif (!empty($request->password) && empty($request->file())) {
            $password = Hash::make($request->password);
            $data1 = $request->except('password');
            $user = User::find($id);
            $user->update($data1);
            $data2 = array(
                'password' => $password,
            );
            $user->update($data2);
            return redirect('profile');
        }elseif (empty($request->password) && !empty($request->file())){
            $name = $request->file('file_picture')->getClientOriginalName();
            $path = $request->file('file_picture')->move(public_path().'/assets/',$name);
            $data1 = $request->except('password');
            $user = User::find($id);
            $user->update($data1);
            $data2 = array(
                'file_picture' => $name,
            );
            $user->update($data2);
            return redirect('profile');
        }else{
            return redirect('profile');
        }
    }
}
