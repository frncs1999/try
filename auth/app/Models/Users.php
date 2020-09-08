<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Users extends Eloquent
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'users';
}