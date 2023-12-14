<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    public function purchased_items() {
        return $this->hasMany(Purchased_Item::class);
    }

    public function sold_items() {
        return $this->hasMany(Sold_Item::class);
    }
}
