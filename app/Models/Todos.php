<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
    protected $table = 'todos';
    protected $primaryKey = 'id';
    protected $fillable = ['task', 'is_done', 'user_id'];
}
