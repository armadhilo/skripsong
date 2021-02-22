<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

// use App\Models\Admin\MasterSoal;

class Body extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'body';
    protected $guarded = ['id'];
    protected $hidden = ['jawabanBenar'];

    public function header(){ 
        return $this->belongsTo(Header::class); 
    }
}