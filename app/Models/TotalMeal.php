<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BorderDetail;

class TotalMeal extends Model
{
    use HasFactory;
    public function border_detail(){
        return $this->belongsTo(BorderDetail::class, 'border_detail_id','id');
    }
}
