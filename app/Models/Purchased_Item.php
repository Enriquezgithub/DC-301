<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchased_Item extends Model
{
    use HasFactory;
    
    public function merchandise() {
        return $this->belongsTo(Merchandise::class);
    }

    public function purchase() {
        return $this->belongsTo(Purchase::class);
    }
}
