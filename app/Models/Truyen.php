<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    // khai báo danh mục truyện
    public $timestamps = false; 
    protected $fillable= [
        'tentruyen','tomtat','kichhoat','slug_truyen','hinhanh','danhmuc_id'
    ];
    protected $primaryKey='id';
    protected $table="truyen";

    public function danhmuctruyen()
    {
        return $this->belongsTo('App\Models\DanhMucTruyen','danhmuc_id','id');
    }
}
