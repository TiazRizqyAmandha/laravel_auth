<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Panggil SendMail yang telah dibuat
use App\Mail\SendMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function index(Request $request)
	{
		// $user = \App\User::all();
		// $nama = $user->name = $request->input('name');
		$nama = "Tiaz Rizqy Amandha";
		$email = "amandhatiazrizqi@gmail.com";
		$kirim = Mail::to($email)->send(new SendMail($nama));

		if($kirim){
			echo "Pendaftaran Berhasil";
		}

	}
} 