<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;
    //protected $primaryKey = 'sale_id';
    // khai báo khóa chính
    // $table->id() => tự liên kết
    // Stable->id('name') => cần định nghĩa lại khóa chinh = protected $primaryKey = 'name';

    protected $fillable = [
        'computer_id',
        'reporter_by',
        'reporter_date',
        'description',
        'urgency',
        'status'
    ];
    // khai báo những cột mà controller có thể tác động vào 

    public function computer()
    {
        return $this->belongsTo(Computer::class, 'computer_id', ownerKey: 'id');
    }
    // liên kết khóa chính với khóa ngoại bằng mối quan hệ 1 nhiều hoặc nhiều nhiềunhiều
}
