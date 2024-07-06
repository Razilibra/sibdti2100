<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    // Define the table name (optional if it follows Laravel's naming conventions)
    protected $table = 'Prodi';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'jurusan',
        'prodi',
        'kaprodi',
    ];

    // Optionally, define the default attributes
    protected $attributes = [
        'jurusan' => '',
        'prodi' => '',
        'kaprodi' => '',
    ];
}
