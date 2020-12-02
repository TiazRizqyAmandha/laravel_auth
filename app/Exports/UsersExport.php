<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function headings(): array
    {
    	return [
    		'Nama Lengkap',
    		'Nama Pengguna',
    		'Email',
    		'Tanggal Lahir',
    		'Angkatan',
    		'Nomor Telepon',
    		'Jenis Kelamin',
    		'Peran',
    		'Alamat',
    		'Deskripsi Diri',
    		'Status Akun',
    	];
    }

    public function map($anggota): array
    {
        return [
            $anggota->name,
            $anggota->username,
            $anggota->email,
            $anggota->birthdate,
            $anggota->generation,
            $anggota->phone_number,
            $anggota->gender,
            $anggota->role,
            $anggota->address,
            $anggota->self_description,
            $anggota->status,
        ];
    }
}
