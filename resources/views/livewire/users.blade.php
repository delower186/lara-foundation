<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 rounded-lg shadow-sm">
            <div class="mb-2 float-right">
                <x-jet-button wire:click="addOrEdit()">{{ __('Add New') }}</x-jet-button>
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                  <table class="w-full">
                    <thead>
                      <tr class="text-md font-semibold tracking-wide text-center text-gray-100 bg-gray-700 uppercase border-b border-gray-100">
                        <th class="px-4 py-3 border">ID</th>
                        <th class="px-4 py-3 border">Name</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Role</th>
                        <th class="px-4 py-3 border">Activation</th>
                        <th class="px-4 py-3 border">Created_at</th>
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
                                                <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
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
                                        @if ($user->roles->count() > 0 )

                                            @foreach ($user->roles as $role)
                                                {{ $role->name }}
                                            @endforeach

                                        @endif
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
                                        <x-jet-secondary-button wire:click="addOrEdit({{ $user->id }})">Edit</x-jet-secondary-button>
                                        <x-jet-danger-button wire:click="confirmingUserDeletion({{ $user->id }})">Del</x-jet-danger-button>
                                    </td>
                                </tr>
                            @endforeach
                        @else

                        @endif
                    </tbody>
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-center text-gray-100 bg-gray-700 uppercase border-b border-gray-100">
                            <th class="px-4 py-3 border">ID</th>
                            <th class="px-4 py-3 border">Name</th>
                            <th class="px-4 py-3 border">Email</th>
                            <th class="px-4 py-3 border">Role</th>
                            <th class="px-4 py-3 border">Activation</th>
                            <th class="px-4 py-3 border">Created_at</th>
                            <th class="px-4 py-3"></th>
                        </tr>
                      </thead>
                  </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete User Confirmation Modal --}}
    <x-jet-dialog-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

            <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <x-jet-input type="password" class="mt-1 block w-3/4"
                            placeholder="{{ __('Password') }}"
                            x-ref="password"
                            wire:model.defer="password"
                            wire:keydown.enter="deleteUser" />

                <x-jet-input-error for="password" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{-- Add or Edit User Modal --}}
    <x-jet-dialog-modal wire:model="addOrEdit">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="current_password" value="{{ __('Current Password') }}" />
                <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
                <x-jet-input-error for="current_password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="password" value="{{ __('New Password') }}" />
                <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
                <x-jet-input-error for="password" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addOrEdit')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
