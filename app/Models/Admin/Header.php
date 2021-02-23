<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

// use App\Models\Admin\MasterSoal;

class Header extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'header';
    protected $guarded = ['id'];

    public function soal(){ 
        return $this->belongsTo(Soal::class); 
    }

    public function package(){
        return $this->belongsTo(Package::class); 
    }

    public function body(){
        return $this->hasMany(Body::class); 
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}