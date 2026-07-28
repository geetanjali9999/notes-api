<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['user_fk_id','title', 'content', 'remarks'];
    // access only her note 
    public function user()
    {
        return $this->belongsTO(User::class, 'user_fk_id');
    }

    
}
