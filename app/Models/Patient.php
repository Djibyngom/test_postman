<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email',
        'phone', 'birth_date', 'blood_group',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    // Relation : un patient a plusieurs rendez-vous
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
