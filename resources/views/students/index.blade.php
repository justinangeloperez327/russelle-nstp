<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="flex justify-end space-x-2 p-2">
                    <a href="{{ route('students.create') }}" type="button" class="py-2 px-4 bg-blue-500 text-white rounded text-sm">Add Student</a>
                    <a href="/students/upload" type="button" class="py-2 px-4 bg-lime-500 text-white rounded text-sm">Batch Upload</a>
                </div>
                <div class="p-2">
                    <form method="GET" action="{{ route('students.index') }}">
                        <div class="mb-4">
                            <x-input-label for="search" :value="__('Search')" />
                            <x-text-input id="search" class="block mt-1 w-full" type="text" name="search" placeholder="Search" value="{{ old('search') }}"/>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="course" :value="__('Course/Program')" />
                            <x-select-option id="course" class="block mt-1 w-full" name="course_id" required>
                                <option value="0">Please Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                @endforeach
                            </x-select-option>
                        </div>
                        {{-- <div class="mb-4">
                            <x-input-label for="type" :value="__('NSTP Type')" />
                            <x-select-option id="enrollment_type" class="block mt-1 w-full" name="enrollment_type" autofocus autocomplete="enrollment_type" >
                                @foreach ($nstpTypes as $type)
                                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                                @endforeach
                            </x-select-option>
                        </div>
                        <div class="mb-4">
                            <x-input-label for="enrollment_year" :value="__('Enrollment Year')" />
                            <x-select-option class="block mt-1 w-full" name="enrollment_year" autofocus autocomplete="enrollment_year" >
                                <option value="">Select Year</option>
                                @foreach ($graduationYears as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </x-select-option>
                        </div> --}}
                        <button type="submit" class="py-2 px-4 bg-blue-500 text-white rounded">Filter</button>
                    </form>
                </div>

                <div class="flex justify-start space-x-2 p-2">
                    <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded  text-sm">Select all</button>
                    <a href="#" id="downloadCertificateLink" class="py-2 px-4 bg-indigo-500 text-white rounded text-sm">Download Certificate</a>

                </div>

                <div id="downloadCertificateModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="bg-white rounded-lg p-4 m-4 shadow-lg">
                            <!-- Modal content -->
                            <div class="text-right">
                                <button id="closeModal" class="text-red-500">Close</button>
                            </div>
                            <h2 class="text-lg font-bold">Download Certificate</h2>
                            <!-- Form or additional content goes here -->
                            <p>Please confirm your details before downloading.</p>
                        </div>
                    </div>
                </div>

                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider"></th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Seq. No.
                            </th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Student ID
                            </th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Course
                            </th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                NSTP Type
                            </th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                School Year
                            </th>
                            <th scope="col" class="px-6 py-2 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($students as $student)
                        <tr>
                            <td class="px-6 py-2 whitespace-nowrap">
                                <input type="checkbox" class="form-checkbox h-4 w-4 text-blue-500 rounded" name="selected_students[]" value="{{ $student->student_id }}"/>
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm">
                                {{ $student->seq_no }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm">
                                {{ $student->student_id }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm">
                                {{ $student->fullname }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm">
                                {{ $student->course?->name }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm">
                                {{ $student->enrollment_type }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm">
                                {{ $student->enrollment_year }}
                            </td>
                            <td class="px-6 py-2 whitespace-nowrap text-sm">
                                {{-- <a href="{{ route('certificates.download', $student->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                    Download
                                </a> --}}

                                <a href="{{ route('students.edit', $student->id) }}" class="text-green-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this student?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var selectAllButton = document.getElementById('selectAll');
                        if (selectAllButton) {
                            selectAllButton.addEventListener('click', function() {
                                const checkboxes = document.querySelectorAll('input[name="selected_students[]"]');
                                checkboxes.forEach(checkbox => {
                                    checkbox.checked = true;
                                });
                            });
                        }

                        var downloadLink = document.getElementById('downloadCertificateLink');
                        if (downloadLink) {
                            downloadLink.addEventListener('click', function(event) {
                                event.preventDefault(); // Prevent the default link behavior
                                var modal = document.getElementById('downloadCertificateModal');
                                if (modal) {
                                    modal.classList.remove('hidden'); // Show the modal
                                }
                            });
                        }

                        var closeModalButton = document.getElementById('closeModal');
                        if (closeModalButton) {
                            closeModalButton.addEventListener('click', function() {
                                var modal = document.getElementById('downloadCertificateModal');
                                if (modal) {
                                    modal.classList.add('hidden'); // Hide the modal on close button click
                                }
                            });
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
