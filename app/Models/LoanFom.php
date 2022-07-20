<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanFom extends Model
{
    protected $fillable = [
        'balance',
    ];
    use HasFactory;
}
