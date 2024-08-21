<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    // Define the relationship to the Company model
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected $fillable = [
        'firstname',
        'lastname',
        'company_id',
        'email',
        'phone',
    ];
}
