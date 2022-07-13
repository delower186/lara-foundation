<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg shadow-sm">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="text-md font-semibold tracking-wide text-center text-gray-100 bg-gray-700 uppercase border-b border-gray-100">
                        <th class="px-4 py-3 border">ID</th>
                        <th class="px-4 py-3 border">Name</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Role</th>
                        <th class="px-4 py-3 border">Active</th>
                        <th class="px-4 py-3 border">Registered</th>
                        <th class="px-4 py-3"></th>
                      </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if ($users->count() > 0 )
                            @foreach ( $users as $user)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 text-sm border">{{ $user->id }}</td>
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="{{ $user->profile_photo_url }}" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{ $user->name }}</p>
                                                <p class="text-xs text-gray-600">Developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms font-semibold border"> {{ $user->email }} </td>
                                    <td class="px-4 py-3 text-sm border">
                                        {{ $user->role($user) }}
                                    </td>
                                    <td class="px-4 py-3 text-xs border">
                                        @if ($user->active == true)
                                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> Yes </span>
                                        @else
                                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-sm"> No </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm border">{{ $user->created_at }}</td>
                                    <td class="px-4 py-3 text-sm border">
                                        <x-jet-secondary-button wire:click="edit({{ $user->id }})">Edit</x-jet-secondary-button>
                                        <x-jet-danger-button wire:click="confirmingUserDeletion({{ $user->id }})">Del</x-jet-danger-button>
                                    </td>
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
                            <th class="px-4 py-3 border">Email</th>
                            <th class="px-4 py-3 border">Role</th>
                            <th class="px-4 py-3 border">Active</th>
                            <th class="px-4 py-3 border">Registered</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                      </thead>
                  </table>
                  <div class="mb-2 mt-2 ml-2 mr-2">
                    {{ $users->links() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete User Confirmation Modal --}}
    <x-jet-dialog-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete User') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this user? Once user is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteUser({{ $this->userId }})" wire:loading.attr="disabled">
                {{ __('Delete User') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Edit User Modal --}}
    <x-jet-dialog-modal wire:model="edit">
        <x-slot name="title">
            {{ __('Update User') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="role" value="{{ __('Role') }}" />
                <select id="role" class="mt-1 block w-full rounded-md" wire:model.defer="user.role">
                    <option value="">Select Role</option>
                    @if ($roles->count() > 0)
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    @else
                        <option value=null>No Roles Found!</option>
                    @endif
                </select>
                <x-jet-input-error for="user.role" class="mt-2"/>
            </div>
            <div class="block mt-4">
                <label for="activate" class="flex items-center">
                    <x-jet-checkbox id="activate" wire:model.defer="user.activate" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Activate User?') }}</span>
                </label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('edit')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3" wire:click="update({{ $this->userId }})" wire:loading.attr="disabled">
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
