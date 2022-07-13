<?php

namespace App\Http\Livewire\Manage;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Users extends Component
{
    use WireToast;
    use WithPagination;

    public $confirmingUserDeletion = false;
    public $edit = false;
    public $userId = null;
    public $user;

    protected $rules = [
        'user.role' => 'required'
    ];

    public function render()
    {
        //get admin user id
        $adminId = Role::find(1)->users[0]->id;
        //fetch all user except admin
        $users = User::where('id','!=',$adminId)->paginate(10);
        $roles = Role::where('id', '!=',1)->get();
        return view('livewire.manage.users',['users' => $users, 'roles' => $roles]);
    }

    public function confirmingUserDeletion($id)
    {
        $this->confirmingUserDeletion = true;
        $this->userId = $id;
    }

    public function edit($id = null)
    {
        $this->edit = true;
        $this->userId = $id;

        if($id !== null)
        {
            $selectedUser = User::findOrFail($id);
            $this->user['role'] = $selectedUser->roleId($selectedUser);
            $this->user['activate'] = $selectedUser->active;
        }
    }

    public function update($id)
    {
        $this->validate();
        $selectedUser = User::findOrFail($id);
        $selectedUser->active = $this->user['activate'];
        $selectedUser->roles()->sync($this->user['role']);
        $selectedUser->save();

        $this->edit = false;
        toast()->success('User Updated Successfully','Success')->push();
    }

    public function deleteUser($id)
    {
        $selectedUser = User::findOrFail($id);
        $selectedUser->roles()->detach($selectedUser->roleId($selectedUser));
        $selectedUser->delete();
        $this->confirmingUserDeletion = false;

        toast()->success('User Deleted Successfully','Success')->push();
    }
}
