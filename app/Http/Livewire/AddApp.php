<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\App as Application;

class AddApp extends Component
{
    public $name = '';
    public $showNewAppModal = false;

    /**
     * Render the component blade file
     */
    public function render()
    {
        return view('livewire.add-app');
    }

    /** Toggle modal on */
    public function showAppAddModal()
    {
        $this->showNewAppModal = true;
    }

    /** Toggle modal off */
    public function dismissAppAddModal()
    {
        $this->showNewAppModal = false;
    }

    /**
     * Saves the new app to the database
     */
    public function addApp()
    {

        $validatedData = $this->validate([
            'name' => 'required|string'
        ]);
        
        $data = $validatedData + [
            'user_id' => Auth::user()->id,
            'team_id' => Auth::user()->currentTeam->id,
            'app_id' => Application::generateAppID(),
            'app_secret' => Application::generateAppSecret(),
        ];

        Application::create($data);

        $this->showNewAppModal = false;
        return redirect('/apps');
    }
}
