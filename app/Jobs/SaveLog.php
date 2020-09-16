<?php

namespace App\Jobs;

use Log;
use Carbon\Carbon;
use App\Events\LogSaved;
use Illuminate\Bus\Queueable;
use App\Models\Log as LoggerLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SaveLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $app;
    public $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($app, $request)
    {
        $this->app = $app;
        $this->request = $request;
        \Log::info('Job dispatched');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Log::info('Job being handled');

        $log = LoggerLog::whereDate('created_at', Carbon::today())
            ->where('app_id', $this->app->id)
            ->get()
            ->first();

        if (!$log) {
            $log = new Log;
            $log->app_id = $this->app->id;
        }

        $breaks = "<br/><br/>";
        $filtered_logs = str_replace("\\n", "<br/>", $this->request->log);
        $log->details = $this->prepend($breaks, $log->details);
        $log->details = $this->prepend($filtered_logs, $log->details);

        switch ($this->request->logLevel) {
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
                // Do something?
                break;
        }

        try{
            if(!$log->save()){
                \Log::info('Failed saving logs');
            }
            event(new LogSaved($log));
        } catch(\Exception $e){
            \Log::info($e->getMessage());
        }

        \Log::info('Job handled');
    }
}
