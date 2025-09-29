<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saleslog extends Model
{
    use HasFactory;

    protected $fillable = [
        'pc_id',
        'branch_id',
        'ssid',
        'coins',
        'credits',
    ];

    public function pc()
    {
        return $this->belongsTo(Pc::class);
    }  
      public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}



