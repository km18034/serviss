<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationSparePart extends Model
{
    use HasFactory;

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id'); //$this - viens ieraksts DB
    }

    public function sparePart()
    {
        return $this->belongsTo(SparePart::class, 'spare_part_id', 'id'); 
    }
}
