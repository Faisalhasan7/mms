<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealCost extends Model
{
    use HasFactory;
    public function border_detail(){
        return $this->belongsTo(BorderDetail::class, 'border_detail_id','id');
    }
}
