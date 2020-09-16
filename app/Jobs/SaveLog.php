<?php

namespace App\Jobs;

use Log;
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

    public $log;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(LoggerLog $log)
    {
        $this->log = $log;
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

        $breaks = "<br/><br/>";
        $filtered_logs = str_replace("\\n", "<br/>", $request->log);
        $this->log->details = $this->prepend($breaks, $this->log->details);
        $this->log->details = $this->prepend($filtered_logs, $this->log->details);

        switch ($request->logLevel) {
            case Log::INFO:
                $this->log->info_count += 1;
                break;
            case Log::ERROR:
                $this->log->error_count += 1;
                break;
            case Log::WARNING:
                $this->log->warning_count += 1;
                break;
            default:
                // Do something?
                break;
        }

        try{
            if(!$this->log->save()){
                \Log::info('Failed saving logs');
            }
            event(new LogSaved($log));
        } catch(\Exception $e){
            \Log::info($e->getMessage());
        }

        \Log::info('Job handled');
    }
}
