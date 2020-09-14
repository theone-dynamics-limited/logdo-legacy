<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    const INFO = 'info';
    const ERROR = 'error';
    const WARNING = 'warning';

    public function app()
    {
        return $this->belongsTo(App::class);
    }
}