<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
    * Where to redirect admins after login.
    *
    * @var string
    */
    protected $redirectTo = '/admin';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    /**
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function login(Request $request)
        {
            $this->validate($request, [
                'username' => 'required|min:2',
                'password' => 'required|min:6'
            ]);
            if (Auth::guard('admin')->attempt([
                'username' => $request->username,
                'password' => $request->password
            ], $request->get('remember'))) {
                $username = $request->username;
                $admin = auth()->guard('admin')->user();
                //$admin=Admin::where('username',$username)->first();
                Auth::login($admin);
                //return redirect('/');
                return redirect()->intended(route('admin.dashboard'));
            }
                return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        Auth::logout();
        return redirect()->route('admin.login');
    }
// public function xulydangnhap(Request $request){
//         // dd($request->all());
//     //     $request->validate(['email'=>'required','password'=>'required'
        
//     // ],['email.required'=>'Không được để trống tên tài khoản',
//     //     'password.required'=>'Không được để trống tên mật khẩu']);
    
//         $array = [
//             'email' => $request->email,
//             'password'=>$request->password,
//         ];
//         $tentkkh= $request->email;
//         if(Auth::attempt($array)){
//             $user=Admin::where('email',$tentkkh)->first();
//             Auth::login($user);
//             return redirect('/');
//         }else{ 
//             dd($array);
            
//         }
        
//     }
}
