<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

// use App\Models\Admin\PackageSoal;

class Soal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    
    protected $table = 'soal';
    protected $guarded = ['id'];
    protected $hidden = ['jawabanBenar'];

    public function package()
    { 
        return $this->belongsTo(Package::class); 
    }

    public function header(){
        return $this->hasOne(Header::class);
    }
}