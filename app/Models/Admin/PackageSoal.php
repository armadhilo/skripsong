<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PackageSoal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'package_soal';
    protected $guarded = ['id'];
}