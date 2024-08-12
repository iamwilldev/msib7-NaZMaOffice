<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    {{-- Total Products --}}
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                        Total Products
                                    </div>
                                </div>
                                <div class="text-xl font-bold text-gray-600 dark:text-gray-400">
                                    {{ $data['totalProducts'] }}
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                                Number of products
                            </div>
                        </div>
                    </div>
                    {{-- Product Active --}}
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                        Active Products
                                    </div>
                                </div>
                                <div class="text-xl font-bold text-gray-600 dark:text-gray-400">
                                    {{ $data['totalProductsActive'] }}
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                                Number of active products
                            </div>
                        </div>
                    </div>
                    {{-- Total User --}}
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                        Total Users
                                    </div>
                                </div>
                                <div class="text-xl font-bold text-gray-600 dark:text-gray-400">
                                    {{ $data['totalUsers'] }}
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                                Number of users
                            </div>
                        </div>
                    </div>
                    {{-- User Active --}}
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                        Active Users
                                    </div>
                                </div>
                                <div class="text-xl font-bold text-gray-600 dark:text-gray-400">
                                    {{ $data['totalUsersActive'] }}
                                </div>
                            </div>
                            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400">
                                Number of active users
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Title 10 Product Latest --}}
                <h2 class="p-6 text-gray-900 dark:text-gray-200 leading-tight">
                    10 Latest Products
                </h2>

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Image
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Price
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-10 w-10 rounded-full">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-200">{{ $product->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-200">{{ $product->price }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $product->status ? 'green' : 'red' }}-100 text-{{ $product->status ? 'green' : 'red' }}-800 dark:bg-{{ $product->status ? 'green' : 'red' }}-800 dark:text-{{ $product->status ? 'green' : 'red' }}-100">
                                        {{ $product->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
