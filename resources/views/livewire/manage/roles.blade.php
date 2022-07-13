<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg shadow-sm">
            @can('admin')
                <div class="mb-2 float-right">
                    <x-jet-button wire:click="addOrEdit()">{{ __('Add New') }}</x-jet-button>
                </div>
            @endcan
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="text-md font-semibold tracking-wide text-center text-gray-100 bg-gray-700 uppercase border-b border-gray-100">
                        <th class="px-4 py-3 border">ID</th>
                        <th class="px-4 py-3 border">Name</th>
                        <th class="px-4 py-3 border">Users</th>
                        <th class="px-4 py-3 border">Created</th>
                        @can('admin')
                            <th class="px-4 py-3"></th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($roles->count() > 0 )
                            @foreach ( $roles as $role)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 text-sm border">{{ $role->id }}</td>
                                    <td class="px-4 py-3 text-sm border">{{ $role->name }}</td>
                                    <td class="px-4 py-3 text-sm border"><span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{ $role->users->count() }} </span></td>
                                    <td class="px-4 py-3 text-sm border">{{ $role->created_at }}</td>
                                    @can('admin')
                                        <td class="px-4 py-3 text-sm border">
                                            <x-jet-secondary-button wire:click="addOrEdit({{ $role->id }})">Edit</x-jet-secondary-button>
                                            <x-jet-danger-button wire:click="confirmingRoleDeletion({{ $role->id }})">Del</x-jet-danger-button>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        @else
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm border">
                                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-sm"> Nothing Found! </span>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-center text-gray-100 bg-gray-700 uppercase border-b border-gray-100">
                            <th class="px-4 py-3 border">ID</th>
                            <th class="px-4 py-3 border">Name</th>
                            <th class="px-4 py-3 border">Users</th>
                            <th class="px-4 py-3 border">Created</th>
                            @can('admin')
                                <th class="px-4 py-3"></th>
                            @endcan
                        </tr>
                      </thead>
                  </table>
                    <div class="mb-2 mt-2 ml-2 mr-2">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete User Confirmation Modal --}}
    <x-jet-dialog-modal wire:model="confirmingRoleDeletion">
        <x-slot name="title">
            {{ __('Delete Role') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this role?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingRoleDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteRole({{ $this->roleId }})" wire:loading.attr="disabled">
                {{ __('Delete Role') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Add or Edit User Modal --}}
    <x-jet-dialog-modal wire:model="addOrEdit">
        <x-slot name="title">
            @if (!isset($this->roleId))
                {{ __('Add Role') }}
            @else
                {{ __('Update Role') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 mb-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="role.name" autocomplete="user.name" />
                <x-jet-input-error for="role.name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addOrEdit')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="save()" wire:loading.attr="disabled">
                @if (!isset($this->roleId))
                    {{ __('Save') }}
                @else
                    {{ __('Update') }}
                @endif
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

