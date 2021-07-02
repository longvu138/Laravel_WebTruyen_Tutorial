<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sach extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    // khai báo danh mục truyện
    public $timestamps = false;
    protected $fillable = [
        'tensach', 'tomtat', 'created_at',
        'updated_at', 'kichhoat', 'slug_sach', 'hinhanh',  'luotxem','tukhoa','noidung'
    ];
    protected $primaryKey = 'id';
    protected $table = "sach";

    // public function danhmuctruyen()
    // {
    //     return $this->belongsTo('App\Models\DanhMucTruyen', 'danhmuc_id', 'id');
    // }
    // public function chapter()
    // {
    //     # 1 truyện nhiều chapter
    //     return $this->hasMany('App\Models\chapter', 'truyen_id', 'id');
    // }
    // public function theloai()
    // {
    //     return $this->belongsTo('App\Models\TheLoai', 'theloai_id', 'id');
    // }
}
