<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sold_Item extends Model
{
    use HasFactory;

    

    public function sale() {
        return $this->belongsTo(Sale::class);
    }

    public function merchandise() {
        return $this->belongsTo(Merchandise::class);
    }
}
