<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
// use Validator;
// use Hash;
// use Session;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifPendaftaranAlumni;
use App\Mail\ForgotPassword;
use App\Mail\NotifEmailAlumni;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function viewchange($username,$userkey){
        dd("hai");
        return view('changepasswordadmin',['username'=>$username,'userkey'=>$userkey]);
    }
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        } else { // false

            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('login');
        }
    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {   
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|confirmed',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ];

        $messages = [
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::where('key_user', $request->input('key_user'))->first();
        $user->password = Hash::make($request->password);
        $user->address = ucwords(strtolower($request->address));
        $user->birthdate = ucwords(strtolower($request->birthdate));
        $user->phone_number = ucwords(strtolower($request->phone_number));
        $user->self_description = ucwords(strtolower($request->self_description));
        $user->status = 'Aktif';
        $user->email_verified_at = \Carbon\Carbon::now();

        // Mail::raw('Selamat Datang'.$user->name, function($message) use($user){
        //     $message->to($user->email, $user->name);
        //     $message->subject('Selamat anda sudah terdaftar di Website Alumni');
        // });

        $details = [
            'name' => $user->name,
            'username' => $user->username,
        ];
        \Mail::to($user->email)->send(new NotifPendaftaranAlumni($details));
        echo "Email Sudah Dikirim";

        $simpan = $user->save();


        if ($simpan) {
            Session::flash('success', 'Pendaftaran berhasil! Silahkan masuk untuk mengakses data');
            return redirect()->route('login');
        } 
        else {
            Session::flash('errors', ['' => 'Pendaftaran gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }


    public function halamanKeyUser()
    {
        return view('userkey');
    }
    public function keyUser(Request $request)
    {
        $rules = [
            'key_user'                  => 'required',
        ];

        $messages = [
            'key_user.required'         => 'Key wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::where('key_user', $request->input('key_user'))->first();
        if ($user != null) {
            if($user->status == 'Belum Aktif')
            {
                Session::flash('success', 'Kunci ditemukan, silahkan lengkapi data diri pendaftaran');
                return redirect()->route('register')->with(['data_register' => $user]);
            }
            elseif ($user->status == 'Aktif') {
                Session::flash('no', 'Kunci sudah dipakai, silahkan masukkan kunci yang lain');
                return redirect()->route('key-user');
            }
        }
        else {
            Session::flash('error', 'Kunci tidak ditemukan, pastikan Kunci yang dimasukan sudah benar');
            return redirect()->route('key-user');
        }
    }


    public function halamanEmailUser()
    {
        return view('emailkey');
    }
    public function keyEmail(Request $request)
    {
        $rules = [
            'email_key'                  => 'required',
        ];

        $messages = [
            'email_key.required'         => 'Email wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::where('email', $request->input('email_key'))->first();
        

        if ($user != null) 
        {
            $details = [
                'key_user' => $user->key_user,
                'name' => $user->name,
            ];
            if($user->status == 'Belum Aktif')
            {
                \Mail::to($user->email)->send(new NotifEmailAlumni($details));
                Session::flash('success', 'Email ditemukan, silahkan cek notifikasi email anda');
                return redirect()->route('key-user');
            }
            elseif ($user->status == 'Aktif') {
                Session::flash('no', 'Email sudah dipakai, silahkan masukkan email yang lain');
                return redirect()->route('email-key');
            }
        }
        else {
            Session::flash('gagal', 'Email tidak ditemukan, pastikan email yang dimasukan sudah benar');
            return redirect()->route('email-key');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }

    public function forgot(){
        return view('forgot');
    }

    public function password(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = DB::table('users')
        ->where('email','=',$request->email)->first();

        $user = User::where('email','=',$request->email)->first();
        $username = $user->id;
        $userkey = $user->password_key;


        
        if($user != null) {
            if($user->status == 'Aktif'){
                $status = 'success';
                $details = [
                    'name' => $user->name,
                    'password_key' => $user->password_key,
                    'link' => url('/changepassword/'.$username.'/'.$userkey),
                ];
                 \Mail::to($user->email)->send(new ForgotPassword($details));
                return redirect('/forgot_password')->with(['status' => $status]);
            }
            else{
                $status = 'notactive';
                return redirect('/forgot_password')->with(['status' => $status]);
            }
            
        } else {
            $status = 'failed';
            return redirect('/forgot_password')->with(['status' => $status]);
        }
    }

    public function new_pass(Request $request, $username, $userkey){
        $request->validate([
            'password' => 'required|min:8',
            'confirmpassword' => 'required|same:password|min:8'
        ]);




        $user = User::find($username);
        $status = 'failed';
        if($userkey == md5($user->password_key)) {
            $user->password = md5($request->password);
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $request->request->add(['password_key' => $request->input('username') . '-' . substr(str_shuffle($permitted_chars), 0, 5)]);
            if($user->save()) {
                $status = 'success';
                return redirect()->route('login')->with(['status' => $status]);
            } else {
                $result= 'failed';
            }
        } else {
            $result = 'failed';
        }
        return redirect('/changepassword/'.$username.'/'.$userkey)->with(['status' => $status]);
    }


}
