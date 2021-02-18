<?php

namespace App\Models\Login;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    protected $guarded = ['id'];
}