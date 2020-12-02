<?php

namespace App\Exports;

use App\Works;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorksExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Works::all();
    }

    public function headings(): array
    {
    	return [
    		'Nama Anggota',
    		'Perusahaan',
    		'Posisi',
    		'Alamat Perusahaan',
    		'Deskripsi Pekerjaan',
    		'Tanggal Masuk',
    		'Tanggal Keluar',
    	];
    }

    public function map($works): array
    {
        return [
            $works->users->name,
            $works->company,
            $works->position,
            $works->works_place,
            $works->description,
            $works->date_start,
            $works->date_end,
        ];
    }
}
