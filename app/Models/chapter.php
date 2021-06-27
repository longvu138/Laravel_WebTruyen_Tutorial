<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable= [
        'truyen_id','tomtat','tieude','noidung','slug_chapter','kichhoat'
    ];
    protected $primaryKey='id';
    protected $table="chapter";

    public function truyen()
    {
        # code...
        return $this->belongsTo('App\Models\Truyen');
    }
}

