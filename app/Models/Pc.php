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
        'branch_id',
    ];

    // 🔹 Relationship: PC belongs to Branch
    public function branch()
    {
        return $this->belongsTo(\App\Models\Branch::class);
    }
}
