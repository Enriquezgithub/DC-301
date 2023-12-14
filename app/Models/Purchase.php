<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function purchased_items() {
        return $this->hasMany(Purchased_Item::class);
    }
}
