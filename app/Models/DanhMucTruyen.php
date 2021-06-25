<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMucTruyen extends Model
{
    use HasFactory;
    // khai báo danh mục truyện
    public $timestamps = false; 
    protected $fillable= [
        'danhmuc','mota','kichhoat','slug_danhmuc'
    ];
    protected $primaryKey='id';
    protected $table="danhmuc";
    public function truyen()
    {
        return $this->hasMany('App\Models\Truyen');
    }
}
