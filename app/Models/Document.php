<?php

// app/Models/Document.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'program_course',
        'type_of_visit',
        'date_of_visit',
        'award',
        'validity_period',
        'grand_mean',
        'document_path',
    ];
}

