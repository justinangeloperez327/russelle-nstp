<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-start p-2">
                    <a href="{{ route('students.index') }}" type="button" class="py-2 px-4 bg-gray-500 text-white rounded">Back</a>
                </div>

                <div class="p-6 text-gray-900">
                    <form action="{{ route('students.update', $student) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="student_id" :value="__('Student ID')" />
                                <x-text-input id="student_id" class="block mt-1 w-full" type="text" name="student_id"  required autofocus autocomplete="student_id" placeholder="Student ID" required value="{{ $student->student_id }}"/>
                                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
                            </div>

                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-3/12 px-3 mb-4 md:mb-0">
                                <x-input-label for="first_name" :value="__('Firstname')" />
                                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" autofocus autocomplete="first_name" placeholder="Firstname" required value="{{ $student->first_name }}"/>
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-2/12 px-3 mb-4 md:mb-0">
                                <x-input-label for="extension_name" :value="__('Ext Name')" />
                                <x-text-input id="extension_name" class="block mt-1 w-full" type="text" name="extension_name" autofocus autocomplete="extension_name" placeholder="Extension Name" value="{{ $student->extension_name }}"/>
                                <x-input-error :messages="$errors->get('extension_name')" class="mt-2" />
                            </div>

                            <div class="w-full md:w-3/12 px-3 mb-4 md:mb-0">
                                <x-input-label for="middle_name" :value="__('Middlename')" />
                                <x-text-input id="middle_name" class="block mt-1 w-full" type="text" name="middle_name" autofocus autocomplete="middle_name" placeholder="Middlename" required  value="{{ $student->middle_name }}"/>
                                <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
                            </div>

                            <div class="w-full md:w-3/12 px-3 mb-4 md:mb-0">
                                <x-input-label for="last_name" :value="__('Lastname')" />
                                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" autofocus autocomplete="last_name" placeholder="Lastname" required  value="{{ $student->last_name }}"/>
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/6 px-3 mb-4 md:mb-0">
                                 <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" autofocus autocomplete="email" placeholder="Email" required value="{{ $student->email }}"/>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-2/6 px-3 mb-4 md:mb-0">
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" autofocus autocomplete="phone" placeholder="09*********" required value="{{ $student->phone }}"/>
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/6 px-3 mb-4 md:mb-0">
                                <x-input-label for="sex" :value="__('Sex')" />
                                <x-select-option id="sex" class="block mt-1 w-full" type="text" name="sex" autofocus autocomplete="sex"  placeholder="Sex" required value="{{ $student->sex }}">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </x-select-option>
                                <x-input-error :messages="$errors->get('sex')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/6 px-3 mb-4 md:mb-0">
                                <x-input-label for="birthdate" :value="__('Birthdate')" />
                                <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" autofocus autocomplete="birthdate"  placeholder="Birthdate" required value="{{ $student->birthdate ? $student->birthdate->format('Y-m-d') : '' }}"/>
                                <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                                <x-input-label for="region" :value="__('Region')" />
                                <x-text-input id="region" class="block mt-1 w-full" type="text" name="region" autofocus autocomplete="region" placeholder="Region" required value="{{ $student->region }}"/>
                                <x-input-error :messages="$errors->get('region')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                                <x-input-label for="province" :value="__('Province')" />
                                <x-text-input id="province" class="block mt-1 w-full" type="text" name="province" autofocus autocomplete="province" placeholder="Province" required value="{{ $student->province }}"/>
                                <x-input-error :messages="$errors->get('province')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                                <x-input-label for="city" :value="__('City/Municipality')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" autofocus autocomplete="city" placeholder="City" required value="{{ $student->city }}"/>
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                                <x-input-label for="brgy" :value="__('Brgy')" />
                                <x-text-input id="brgy" class="block mt-1 w-full" type="text" name="brgy" autofocus autocomplete="brgy" placeholder="Brgy" required value="{{ $student->brgy }}"/>
                                <x-input-error :messages="$errors->get('brgy')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="course_id" :value="__('Program/Course')" />
                                <x-select-option id="course_id" class="block mt-1 w-full" name="course_id" autofocus autocomplete="course"  placeholder="Course" required>
                                    @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                                </x-select-option>
                                <x-input-error :messages="$errors->get('course')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="region" :value="__('Year Level')" />
                                <x-text-input id="year_level" class="block mt-1 w-full" type="number" step="1" min="1" name="year_level" autofocus autocomplete="year_level" placeholder="Year Level" value="1" required value="{{ $student->year_level }}"/>
                                <x-input-error :messages="$errors->get('year_level')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="enrollment_type" :value="__('NSTP TYPE')" />
                                <x-select-option id="enrollment_type" class="block mt-1 w-full" name="enrollment_type" autofocus autocomplete="enrollment_type" required >
                                    @foreach ($nstpTypes as $type)
                                        <option value="{{ $type->name }}" {{ $type->name == $student->enrollment_type ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </x-select-option>
                                <x-input-error :messages="$errors->get('enrollment_type')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="enrollment_year" :value="__('Graduation Year')" />
                                <x-select-option class="block mt-1 w-full" name="enrollment_year" autofocus autocomplete="enrollment_year" required>
                                    <option value="">Select Year</option>
                                    @foreach ($graduationYears as $year)
                                        <option value="{{ $year }}"  {{ $year == $student->enrollment_year ? 'selected' : '' }}>{{ $year }}</option>
                                    @endforeach
                                </x-select-option>
                                <x-input-error :messages="$errors->get('enrollment_year')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="hei_name" :value="__('Hei Name')" />
                                <x-text-input id="hei_name" class="block mt-1 w-full" type="text" name="hei_name" autofocus autocomplete="hei_name" placeholder="Hei Name" value="EXACT College of Asia" disabled/>
                                <x-input-error :messages="$errors->get('hei_name')" class="mt-2" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="hei_type" :value="__('Hei Type')" />
                                <x-select-option id="hei_type" class="block mt-1 w-full" name="hei_type" autofocus autocomplete="hei_type"  placeholder="Hei Type" value="PRIVATE" disabled>
                                    @foreach ($heiTypes as $type)
                                        <option value="{{ $type->name }}">{{ $type->name }}</option>
                                    @endforeach
                                </x-select-option>
                                <x-input-error :messages="$errors->get('hei_type')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/4 px-3 mb-4 md:mb-0">
                                <x-input-label for="nstp_serial_no" :value="__('NSTP Serial No.')" />
                                <x-text-input id="nstp_serial_no" class="block mt-1 w-full" type="text" name="nstp_serial_no" autofocus autocomplete="nstp_serial_no" placeholder="NSTP Serial No." required value="{{ $student->nstp_serial_no }}"/>
                                <x-input-error :messages="$errors->get('nstp_serial_no')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
