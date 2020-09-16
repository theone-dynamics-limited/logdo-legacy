<?php

namespace App\Models;

use Carbon\Carbon;
use App\Jobs\SaveLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class App extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'team_id',
        'app_id',
        'app_secret'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public static function generateAppID()
    {
        return md5(uniqid());
    }

    public static function generateAppSecret()
    {
        return md5(uniqid());
    }
}
