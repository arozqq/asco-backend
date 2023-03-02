<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pills extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'user_id', 'name', 'type', 'amount', 'howManyWeeks', 'howManyDays', 'medicineForm', 'schedule', 'takeit'
         'name', 'username', 'type', 'amount', 'howManyWeeks', 'howManyDays', 'medicineForm', 'schedule', 'takeit'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
