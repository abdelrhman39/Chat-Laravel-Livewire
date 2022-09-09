<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Messages extends Model
{
    use HasFactory , SoftDeletes;

    public $fillable =['user_id' , 'message_text'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
