<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($products) ? 'Edit Product' : 'Add New Product' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col sm:justify-center items-center bg-gray-100 dark:bg-gray-900">
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                    <form method="POST" action="{{ isset($products) ? route('admin.products.update', $products->id) : route('admin.products.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($products))
                            @method('PUT')
                        @endif

                        <!-- Image -->
                        <div>
                            <x-input-label for="image" :value="__('Image')" />
                            <x-file-input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $products->name ?? '')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Price -->
                        <div class="mt-4">
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $products->price ?? '')" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        {{-- Status --}}
                        <div class="mt-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" name="status" class="block mt-1 w-full dark:bg-gray-900 dark:text-gray-300">
                                <option value="1" {{ isset($products) && $products->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ isset($products) && $products->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ isset($products) ? __('Update') : __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
