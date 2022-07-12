<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Fillable Example (Which can be filled)
    // protected $fillable = ['name', 'email', 'status'];

    // Guarded Example (Which can not be filled)
    protected $guarded = [];

    protected $attributes = [
        'status' => 1
    ];

    /* public function getStatusAttribute($attribute)
    {
        return [
            '0' => 'Inactive',
            '1' => 'Active',
        ][$attribute];
    }*/

    public function getStatusAttribute($attribute)
    {
        return $this->statusOptions()[$attribute];
    }

    // Declaring Scope (Naming convention start with "scope")
    public function scopeActive($query)
    {
        return $query->where('status' , 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status' , 0);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function statusOptions()
    {
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress',
        ];
    }

}
