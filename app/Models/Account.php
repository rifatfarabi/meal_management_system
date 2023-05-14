<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "paid",
        "date"
        // "payable",
        // "meal_cost"
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
