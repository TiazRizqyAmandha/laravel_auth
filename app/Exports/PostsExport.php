<?php

namespace App\Exports;

use App\Posts;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Posts::all();
    }

    public function headings(): array
    {
    	return [
    		'Lowongan Kerja',
    		'Deskripsi Pekerjaan',
    		'Kategori',
    		'Nama Pengunggah',
    		'Status Lowongan Kerja',
    		'Filter',
    	];
    }

    public function map($posts): array
    {
        return [
            $posts->title,
            $posts->body,
            $posts->postsCategory->name,
            $posts->users->name,
            $posts->status,
            $posts->filter,
        ];
    }
}
