<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; // If you're using Storage for file handling
use App\Models\Document;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'department',
        'college',
        'lastname',
        'firstname',
        'middlename',
        'email',
        'password',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function checkDuplicateCredentials($firstname, $lastname, $middlename, $email) {
        $user = User::where([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'middlename' => $middlename,
            'email' => $email,
        ])->first();
    
        return $user !== null;
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin'; // Adjust the role value based on your setup
    }

}
