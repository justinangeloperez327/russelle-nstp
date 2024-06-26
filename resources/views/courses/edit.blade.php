<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('courses.update', $course) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="code" :value="__('Code')" />
                                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" autofocus autocomplete="code" placeholder="Code" required value="{{ $course->code }}"/>
                                <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-2/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus autocomplete="name" placeholder="Name" required value="{{$course->name }}"/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
