
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks list') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    @can('manage tasks')
                    <x-link href="{{ route('tasks.create') }}"
                            class="m-4 pl-4 pr-4 pt-2 pb-2 bg-slate-700 rounded text-white text-sm uppercase shadow-md sm:rounded-lg">
                        {{ __('add new task') }}
                    </x-link>
                    @endcan

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Task name
                            </th>

                            @can('manage tasks')
                            <th scope="col" class="px-6 py-3">
                            </th>
                            @endcan

                        </tr>
                        </thead>
                        <tbody>

                        @forelse ($tasks as $task)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $task->name }}
                            </td>

                            @can('manage tasks')
                            <td class="px-6 py-4">
                                <x-link href="{{ route('tasks.edit', $task) }}"
                                        class="inline-flex items-center justify-center px-4 py-2 bg-green-600
                                        border border-transparent rounded-md font-semibold text-xs text-white uppercase
                                        tracking-widest hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring
                                        focus:ring-green-200 active:bg-green-600 disabled:opacity-25 transition">
                                    {{ __('Edit') }}
                                </x-link>
                                <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-jet-danger-button type="submit" onclick="return confirm('Are you sure?')">Delete</x-jet-danger-button>
                                </form>
                            </td>
                            @endcan
                        </tr>
                        @empty
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td colspan="2"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ __('No tasks found') }}
                            </td>
                        </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="ml-4 text-center text-md text-black">
                    {{ config('main.param1') }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>