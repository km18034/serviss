<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id'); //$this - viens ieraksts DB
    }

    public function mechanic()
    {
        return $this->belongsTo(AdminUser::class, 'mechanic_id', 'id');
    }

    public function spareParts()
    {
        return $this->hasMany(ApplicationSparePart::class, 'application_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
