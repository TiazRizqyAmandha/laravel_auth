<?php

namespace App\Exports;

use App\PostsCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsCategoryExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PostsCategory::all();
    }

    public function headings(): array
    {
    	return [
    		'Nama Kategori',
    		'Status',
    	];
    }

    public function map($posts): array
    {
        return [
            $posts->name,
            $posts->status,
        ];
    }
}
