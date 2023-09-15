<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;

    protected $table = 'roles'; // Specify the table name

    protected $fillable = ['name']; // Define the fillable attributes (columns)

    // Add any relationships or custom methods as needed
}