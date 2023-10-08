<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Tên bảng trong cơ sở dữ liệu
    protected $primaryKey = 'id'; // Tên khóa chính

    protected $fillable = ['name', 'desc', 'img'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
