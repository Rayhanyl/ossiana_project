<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use RealRashid\SweetAlert\Facades\Alert;

class AuthenticationController extends Controller
{
    public function login_page(){
        return view('authentication.login');
    }

    public function register_page(){
        return view('authentication.register');
    }

    public function authentication(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $request->session()->regenerate();
            $users = Auth::user();

            switch ($users->role_id) {
                case 1:
                    $role = 'Admin';
                    break;
                case 2:
                    $role = 'Customer';
                    break;
                case 3:
                    $role = 'Manager';
                    break;
                default:
                    break;
            }

            $request->session()->put('role', $role);
            $request->session()->put('role_id', $users->role_id);
            $request->session()->put('name', $users->name);
            $request->session()->put('email', $users->email);
            $request->session()->put('phone', $users->phone);

            if($users->role_id == '1'){

                Alert::toast('Selamat Anda Berhasil login','success');
                return redirect()->route('admin.dashboard');
                
            } elseif ($users->role_id == '2'){
                
                Alert::toast('Selamat Anda Berhasil login','success');
                return redirect()->route('customer.dashboard'); 

            }elseif ($users->role_id == '3'){

                Alert::toast('Selamat Anda Berhasil login','success');
                return redirect()->route('manager.dashboard');

            }                   

        }else{

            Alert::warning('Warning', 'Password atau email anda salah');
            return redirect()->route('login.page')->with('Oppes! You have entered invalid credentials');

        }
    }

    public function authregister(Request $request){

        try {
            
            User::create([
                'name'  => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'phone'     => '+62'.$request->phone,
                'role_id'      => 2,
            ]);

            Alert::toast('Berhasil membuat account','success');
            return redirect()->route('login.page');

        } catch (\Throwable $e) {

            dd($e);
            Alert::warning('Error','Contact Developer to Fix This');
            return redirect()->back();

        }

    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->flush();
        Alert::toast('Berhasil logout', 'success');
        return redirect()->route('landing.page')->with('success','Berhasil Logout');
        
    }
}
