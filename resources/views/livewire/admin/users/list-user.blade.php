<div class="relative">
{{--        <div wire:loading.flex class="justify-center items-center h-screen">--}}
{{--            <x-loading/>--}}
{{--        </div>--}}
    <div class="py-12 px-2">
        @if(!$isCreateFromOpen && !$isEditFromOpen)
            <div class="flex justify-end">
                <button wire:click.prevent="create" class="flex gap-1 items-center p-1 rounded bg-blue-800 text-gray-50 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg> Add New User</button>
            </div>
        @endif
        {{-- Create Form --}}
        @if($isCreateFromOpen)
            <div class="flex justify-center">
                <div class="w-1/2">
                    <div class="flex justify-between">
                        <h1 class="uppercase text-lg text-blue-800 font-semibold">Create User</h1>
                        <button wire:click="closeCreateFrom" type="button" @click="open = false" class="inline-flex items-center py-1 px-2 bg-blue-800 hover:opacity-95 text-white rounded mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>  Back
                        </button>
                    </div>
                    <form wire:submit.prevent="store" class="p-12 bg-white rounded transition-all duration-300 border" autocomplete="off">
                        <div class="mb-4">
                            <label for="name" class="block">Full Name</label>
                            <input type="text" wire:model.defer="state.name" id="name" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('name') ? 'border-rose-300' : '' }}">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block">Email Address</label>
                            <input type="email" wire:model.defer="state.email" id="email" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('email') ? 'border-rose-300' : '' }}">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block">Password</label>
                            <input type="password" wire:model.defer="state.password" id="password" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('password') ? 'border-rose-300' : '' }}">
                            @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="passwordConfirmation" class="block">Confirm Password</label>
                            <input type="password" wire:model.defer="state.password_confirmation" id="passwordConfirmation" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('password') ? 'border-rose-300' : '' }}">
                            @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex gap-1">
                            <button type="submit" wire:loading.attr="disabled" wire:target="store" class="inline-flex items-center py-1 px-2 bg-emerald-600 hover:opacity-95 text-white rounded shadow">
                                <span wire:loading wire:target="store" class="mr-2">
                                    <x-formloading/>
                                </span>
                                Create</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
        {{--    Edit From--}}
        @if($isEditFromOpen)
            <div class="flex justify-center">
                <div class="w-1/2">
                    <div class="flex justify-between">
                        <h1 class="uppercase text-lg text-blue-800 font-semibold">Edit User</h1>
                        <button wire:click="closeEditFrom" type="button" @click="open = false" class="inline-flex items-center py-1 px-2 bg-blue-800 hover:opacity-95 text-white rounded mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                            </svg>  Back
                        </button>
                    </div>
                    <form wire:submit.prevent="update" class="p-12 bg-white rounded transition-all duration-300 border" autocomplete="off">
                        <div class="mb-4">
                            <label for="name" class="block">Full Name</label>
                            <input type="text" wire:model.defer="state.name" id="name" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('name') ? 'border-rose-300' : '' }}">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block">Email Address</label>
                            <input type="email" wire:model.defer="state.email" id="email" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('email') ? 'border-rose-300' : '' }}">
                            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block">Password</label>
                            <input type="password" wire:model.defer="state.password" id="password" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('password') ? 'border-rose-300' : '' }}">
                            @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="passwordConfirmation" class="block">Confirm Password</label>
                            <input type="password" wire:model.defer="state.password_confirmation" id="passwordConfirmation" class="border hover:ring-gray-100 outline-gray-100 p-2 w-full rounded {{ $errors->has('password') ? 'border-rose-300' : '' }}">
                            @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex gap-1">
                            <button type="submit" class="inline-flex items-center py-1 px-2 bg-emerald-600 hover:opacity-95 text-white rounded-md shadow">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

        @if(!$isCreateFromOpen && !$isEditFromOpen)
            <table class="border border-gray-300 bg-white">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="flex items-center gap-1">
                                <button type="button" wire:click.prevent="edit({{ $user }})" class="text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button type="button" wire:click.prevent="confirmUserRemoval({{ $user->id }})" class="text-rose-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
{{--            {{ $users->links()  }}--}}
        @endif

{{--          show delete modal--}}
    </div>
    <div id="deleteModal" class="fixed left-[40%] top-[30%] flex justify-center items-center invisible">
        <div class="bg-white rounded p-4 flex justify-center w-[400px] z-50 scale-50 transition duration-300">
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-rose-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-semibold text-gray-600 mb-4">Are you sure?</h2>
                <p class="mb-4">You won't be able to revert this!</p>
                <button type="button" wire:click.prevent="delete" class="py-2 px-4 rounded bg-blue-400 text-white">Yes, delete it</button>
                <button type="button" wire:click.prevent="hideDeleteModal" class="py-2 px-4 rounded bg-rose-400 text-white">Cancel</button>
            </div>
        </div>
        <div class="fixed left-0 top-0 bg-gray-900 opacity-60 w-full h-screen"></div>
    </div>
</div>




