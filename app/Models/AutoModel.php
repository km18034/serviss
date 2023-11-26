<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoModel extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(AutoBrand::class, 'auto_brand_id', 'id');
    }
}
