<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    protected $table = 'spare_parts';

    public function application()
    {
        return $this->hasMany(ApplicationSparePart::class, 'application_id', 'id');
    }

    public function autoModel()
    {
        return $this->belongsTo(AutoModel::class, 'auto_model_id', 'id'); 
    }
}
