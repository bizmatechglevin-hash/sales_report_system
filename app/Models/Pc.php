<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    use HasFactory;

    // ✅ Allow these fields to be mass assignable
    protected $fillable = [
        'name',
         'sales',
        'branch_id',
    ];
      protected $casts = [
        'sales' => 'decimal:2',
    ];

    // 🔹 Relationship: PC belongs to Branch
    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }
}
