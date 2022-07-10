<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $confirmingUserDeletion = false;
    public $addOrEdit = false;

    public function render()
    {
        $users = User::all();
        return view('livewire.users',['users' => $users]);
    }

    public function confirmingUserDeletion()
    {
        $this->confirmingUserDeletion = true;
    }

    public function addOrEdit()
    {
        $this->addOrEdit = true;
    }
}
