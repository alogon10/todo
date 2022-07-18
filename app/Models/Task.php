<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'tag',
    ];
    protected $guarded = array('id');

    public function user(){
		  return $this->belongsTo('App\Models\User');
    }
    public function tag(){
		  return $this->belongsTo('App\Models\Tag');
    }
}