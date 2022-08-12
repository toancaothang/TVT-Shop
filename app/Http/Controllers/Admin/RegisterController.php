<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Admin;
class RegisterController extends Controller
{
    use AuthenticatesUsers;
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function register(Request $req)
    {
        Admin::create([
            'username' => $req->ten_tk,
            'email' => $req->email,
            'password' => bcrypt($req->mat_khau),
            'status' => 1,
        ]);
        return view('admin.auth.login');
    }

}
