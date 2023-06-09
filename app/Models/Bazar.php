<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "date",
        "description",
        "amount"
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

}
