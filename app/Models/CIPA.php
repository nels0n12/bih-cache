<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CIPA extends Model
{
    use HasFactory;
    //


    public function shareholders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CIPAShareholder::class, 'Company_UIN', 'UIN');
    }

    public function directors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CIPADirector::class, 'Company_UIN', 'UIN');
    }

    public function addresses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CIPAAddress::class, 'Company_UIN', 'UIN');
    }

    public function auditors(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CIPAAuditor::class, 'Company_UIN', 'UIN');
    }

    public function secretaries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CIPASecretary::class, 'Company_UIN', 'UIN');
    }
}
