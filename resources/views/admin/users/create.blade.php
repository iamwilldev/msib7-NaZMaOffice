<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($users) ? 'Edit User' : 'Add New User' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col sm:justify-center items-center bg-gray-100 dark:bg-gray-900">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ isset($users) ? route('admin.users.update', $users->id) : route('admin.users.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($users))
                            @method('PUT')
                        @endif

                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input readonly id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $users->name ?? '')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input readonly id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $users->phone ?? '')" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input readonly id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $users->email ?? '')" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        {{-- Role --}}
                        <div class="mt-4">
                            <x-input-label for="user_type" :value="__('Role')" />
                            <select id="user_type" name="user_type" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="admin" {{ isset($users) && $users->user_type == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ isset($users) && $users->user_type == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                            <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
                        </div>

                        {{-- Status Verification --}}
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="1" {{ isset($users) && $users->email_verified_at ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ isset($users) && !$users->email_verified_at ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ isset($users) ? __('Update') : __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
