<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\countrys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;

class UserController extends Controller
{
    //
    public function index()
    {
        $items = User::paginate(10);
        $data['user'] = $items;
        $data['_view'] = 'Admin.User.index';
        session(['current_page' => $items->currentPage()]);
        return view('Layout.body',$data);
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

    public function create()
    {
        //
        $data['_view'] = 'Admin.User.form';
        return view('Layout.body',$data);
    }

    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6'],]);

        $data = $request->all();
        $u = User::create($data);
        $password = Hash::make($request->password);
        $user = User::find($u->id);
        $pass = ['password' => $password];
        $user->update($pass);
        if (!empty($request->file('file_picture'))){
            $name = $request->file('file_picture')->getClientOriginalName();
            $path = $request->file('file_picture')->move(public_path().'/assets/',$name);
            $file = ['file_picture' => $name];
            $user = User::find($u->id);
            $user->update($file);
            }

        return redirect('user')->with('status', 'Company added!');
        
    }

    public function show($id)
    {
        //
        $data['user'] = User::find($id);
        $data['_view'] = 'Admin.User.detail';
        return view('Layout.body',$data);
    }

    public function edit($id)
    {
        //
        $data['user'] = User::find($id);
        $data['_view'] = 'Admin.User.form';
        return view('Layout.body',$data);
    }

    public function update(Request $request, $id)
    {
        //
        $data = $request->except('password');
        $company = User::find($id);
        $company->update($data);
        if (!empty($request->password)){
        $password = Hash::make($request->password);
        $user = User::find($id);
        $pass = ['password' => $password];
        $user->update($pass);
        }
        if (!empty($request->file('file_picture'))){
            $name = $request->file('file_picture')->getClientOriginalName();
            $path = $request->file('file_picture')->move(public_path().'/assets/',$name);
            $file = ['file_picture' => $name];
            $user = User::find($id);
            $user->update($file);
        }
       
        $lastPage = session('current_page', 1);
        return redirect('user')->with('status', 'user updated!');
    }

    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete($id);
        $lastPage = session('current_page', 1);
        return redirect()->route('user.index', ['page' => $lastPage])->with('status', 'User deleted!');
    }

    public function search(Request $request)
    {
        //
        $search = $request['keyword'];
        $data['user'] = User::where('email','LIKE',"%{$search}%")->get();
        $data['_view'] = 'Admin.User.result';
        return view('Layout.body',$data);
    }


}
