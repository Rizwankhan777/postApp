<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CommentModel;
use Illuminate\Support\Facades\Auth;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'message',
      ];

      public function getUsers(){
        return $this->belongsTo(User::class ,'user_id','id' );
      }
    
      public function getPostComment(){
        return $this->hasMany(CommentModel::class ,'post_id','id' );
      }

      public function getReaction(){
        return $this->hasOne(PostReactionModel::class ,'post_id', 'id' )->where('user_id',Auth::user()->id);
      }




}