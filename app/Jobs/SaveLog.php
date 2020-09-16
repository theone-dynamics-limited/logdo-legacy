<?php

namespace App\Jobs;

use App\Models\Log;
use App\Events\LogSaved;
use Illuminate\Bus\Queueable;
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
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
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

        if(!$this->log->save()){
            // Do something?
        }
        event(new LogSaved($log));
    }
}