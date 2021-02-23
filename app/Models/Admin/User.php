<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

// use App\Models\Admin\MasterSoal;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
    protected $guarded = ['id'];

}