<?php

namespace App\Models;

use Carbon\Carbon;
use App\Events\LogSaved;
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

    public function log($request, $app)
    {
        $log = Log::whereDate('created_at', Carbon::today())
            ->where('app_id', $app->id)
            ->get()
            ->first();

        if (!$log) {
            $log = new Log;
            $log->app_id = $this->id;
        }

        $breaks = "<br/><br/>";
        $filtered_logs = str_replace("\\n", "<br/>", $request->log);
        $log->details = $this->prepend($breaks, $log->details);
        $log->details = $this->prepend($filtered_logs, $log->details);

        switch ($request->logLevel) {
            case Log::INFO:
                $log->info_count += 1;
                break;
            case Log::ERROR:
                $log->error_count += 1;
                break;
            case Log::WARNING:
                $log->warning_count += 1;
                break;
            default:
                return false;
                break;
        }

        if(!$log->save()){
            return false;
        }

        event(new LogSaved($log));
        return true;
    }

    private function prepend(&$prefix, $to) {
        return substr_replace($to, $prefix, 0, 0);
    }
}
