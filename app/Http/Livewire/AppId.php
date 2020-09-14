<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class AppId extends Component
{
    public $app_id;

    protected $listeners = ['selectedAppID' => 'showAppID'];

    public function mount()
    {
        $this->app_id = Auth::user()->apps()->first()->app_id;
    }

    public function render()
    {
        return view('livewire.app-id');
    }

    public function showAppID($appDbID)
    {
        $this->app_id = \App\Models\App::find($appDbID)->app_id;
    }
}
