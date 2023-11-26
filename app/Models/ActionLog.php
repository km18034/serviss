<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionLog extends Model
{
    use HasFactory;

    protected $table = 'action_log';

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id', 'id');
    }
}
