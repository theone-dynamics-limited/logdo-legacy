<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class AppChooser extends Component
{
    public $selectedAppID;

    public function render()
    {
        if ($this->selectedAppID) {
            $this->emit('selectedAppID', $this->selectedAppID);
        }

        // App belongs to teams, if a user is part of a team,
        // he should be able to access the apps created in that team.
        // TODO MA - work on roles associated with that user in the team.
        $user = Auth::user();
        $apps = $user->currentTeam->apps;

        // Let user view all apps in all the teams they belongto?
        // $apps = $user->apps;
        // foreach($user->teams as $team){
        //     $apps = $apps->merge($team->apps);
        // }

        return view('livewire.app-chooser', compact('apps'));
    }
}
