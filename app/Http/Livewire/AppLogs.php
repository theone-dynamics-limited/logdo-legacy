<?php

namespace App\Http\Livewire;

use Auth;
use App\Models\App;
use Livewire\Component;

class AppLogs extends Component
{
    public $logId;
    public $logs = [];
    public $showModal = false;
    public $expandedLog = 'Nothing here yet. Something is not right! 
        Make sure you have <br/> installed one of the SDKs and configured it correctly on your app.';

    // protected $listeners = [
    //     "selectedAppID" => "updateLogs",
    // ];
    // Commented in favour of this.
    public function getListeners()
    {
        return [
            "selectedAppID" => "updateLogs",
            "logSaved" => "updateExpandedLog"
            // "echo:logdo.{$this->logId},LogSaved" => "updateExpandedLog"
            // "echo-private:logdo.{$this->logId},LogSaved" => "updateExpandedLog"
        ];
    }

    public function mount()
    {
        $this->logs = Auth::user()->currentTeam->apps()
        // $this->logs = \App\Models\App::where('user_id', Auth::user()->id)
            ->first()
            ->logs()
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function render()
    {
        return view('livewire.app-logs');
    }

    public function expandLogsFor($log)
    {
        $this->expandedLog = $log['details'];
        $this->showModal = true;
    }

    /**
     * Event callback for the listerner of
     * app change event.
     */
    public function updateLogs($selectedAppID)
    {
        // Fetch the logs for the selected app.
        $this->logs = App::find($selectedAppID)
            ->logs()
            ->orderBy('id', 'DESC')
            ->get();
        \Log::info("Selected: $selectedAppID");
    }

    public function updateExpandedLog($log)
    {
        $app_belongs_to_this_user = Auth::user()->currentTeam
            ->apps()
            ->where('id', $log['app_id'])
            ->get()
            ->first();
        if($app_belongs_to_this_user){
            $this->expandedLog = $log['details'];
        }
    }

    public function toggleLogModal()
    {
        $this->showModal = !$this->showModal;
    }
}
