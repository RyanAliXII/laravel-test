<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{   
    protected $table = "todo";
    protected $fillable = ['title', 'description', 'isDone'];
    use HasFactory;
    use SoftDeletes;
   
    public function getIsDoneAttribute()
    {
        return $this->attributes['is_done'] == 1;
    }
    public function setIsDoneAttribute(bool $value)
    {
        $this->attributes['is_done'] = $value;
    }
    public function getCreatedAtAttribute($value)
    {
        return $this->attributes['created_at'];
    }
}
