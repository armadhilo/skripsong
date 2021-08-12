<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

// use App\Models\Admin\MasterSoal;

class Package extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'package';
    protected $guarded = ['id'];

    public function soal(){ 
        return $this->hasMany(Soal::class); 
    }

    public function header(){
        return $this->hasMany(Header::class);
    }
}