<?php

namespace App\Http\Livewire\Manage;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Roles extends Component
{
    use WireToast;
    use WithPagination;

    public $confirmingRoleDeletion = false;
    public $addOrEdit = false;
    public $roleId = null;
    public $role;

    protected $rules = [
        'role.name' => 'required|string|not_in:admin,administrator,administration,manage,management|min:4'
    ];

    public function render()
    {
        $roles = Role::where('id', '!=',1)->paginate(10);
        return view('livewire.manage.roles',['roles' => $roles]);
    }

    public function confirmingRoleDeletion($id)
    {
        $this->confirmingRoleDeletion = true;
        $this->roleId = $id;
    }

    public function addOrEdit($id = null)
    {
        $this->addOrEdit = true;
        $this->roleId = $id;

        if($id !== null)
        {
            $this->role = Role::findOrFail($id);
        }
    }

    public function save(Role $role)
    {

        $this->validate();

        if(isset($this->role->id))
        {
            $this->role->save();
            toast()->success('Role Updated Successfully','Success')->push();
        }
        else
        {
            $role->name = $this->role['name'];
            $role->save();
            toast()->success('Role Added Successfully','Success')->push();
        }

        $this->addOrEdit = false;

    }

    public function deleteRole(Role $role)
    {

        if($role->users()->count() > 0)
        {
            foreach($role->users as $user)
            {
                $role->users()->detach($user->id);
            }
        }

        $role->delete();

        $this->confirmingRoleDeletion = false;

        toast()->success('Role Deleted Successfully','Success')->push();
    }
}
