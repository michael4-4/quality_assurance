<?php

// app/Models/Document.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;


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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}




