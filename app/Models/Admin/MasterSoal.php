<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MasterSoal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'master_soal';
    protected $guarded = ['id'];

    public function PackageSoal(){ 
        return $this->hasMany('App\Models\Admin\PackageSoal'); 
    }
}