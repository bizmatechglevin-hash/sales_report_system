<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'code',
        'address',
        'phone',
        'manager_id',
        'is_active'
    ];

    // Optional: relationship to User (manager)
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

public function pcs()
{
    return $this->hasMany(\App\Models\Pc::class);
}


}
