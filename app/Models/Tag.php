<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['tag'];
    protected $guarded = array('id');
    public function tasks(){
        return $this ->hasOne('App/Models/Task');
    }
}
