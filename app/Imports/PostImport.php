<?php

namespace App\Imports;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class PostImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'title' => $row['title'],
            'description' => $row['description'],
            'create_user_id' => 3,
            'updated_user_id' => 3,
        ]);
    }
    
    public function rules(): array
    {
        return [
            '*.title' => 'required|string',
            '*.description' => 'required|string',
        ];
    }
}
