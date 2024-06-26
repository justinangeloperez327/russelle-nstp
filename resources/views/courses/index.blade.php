<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-end p-2">
                    <a href="{{ route('courses.create') }}" type="button" class="py-2 px-4 bg-blue-500 text-white rounded">Add Course</a>
                </div>
                <div class="p-2">
                    <form method="GET" action="{{ route('courses.index') }}">
                        <div class="mb-4">
                            <x-input-label for="search" :value="__('Search')" />
                            <x-text-input id="search" class="block mt-1 w-full" type="text" name="search" autofocus autocomplete="search" placeholder="Search" required value="{{ old('search') }}"/>
                        </div>

                        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded">Filter</button>
                    </form>
                </div>
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                CODE
                            </th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                NAME
                            </th>

                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">
                                {{ $course->code }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap">
                                {{ $course->name }}
                            </td>

                            <td class="px-6 py-2 whitespace-nowrap">
                                {{-- <a href="{{ route('certificates.download', $student->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Download
                                </a> --}}

                                <a href="{{ route('courses.edit', $course->id) }}" class="text-green-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="mt-4">
                    {{ $courses->appends(request()->query())->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
