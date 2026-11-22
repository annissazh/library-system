<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'member_code',
        'phone',
        'address',
    ];

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}
