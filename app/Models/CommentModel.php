<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'comment',
      ];
      
      public function getUsers(){
        return $this->belongsTo(User::class ,'user_id','id' );
      }

}
