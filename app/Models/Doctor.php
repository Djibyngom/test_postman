<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'specialty', 'license_number',
        'experience_years', 'is_active', 'bio',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relation : un docteur a plusieurs rendez-vous
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
