<x-app-layout>
    <x-slot name="header">
        <h2 class="ml-10 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Course') }}
        </h2>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <form method="post" action="{{route("course.store")}}">
                @csrf

                <div class="d-flex justify-content-center bg-[#012970] align-items-center">
                    <h3 style="color: white;padding-top: 7px;font-size: 22px;font-weight: bold;">Create a new course</h3>
                </div>
                <div class="row container d-flex justify-content-center ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold;padding-top: 10px;" for="course_name">Course Name<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                            <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Enter the course name">
                            <x-input-error :messages="$errors->get('course_name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;padding-top: 10px;" for="campuses">Campus available<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                            @foreach ($campuses as $campus)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="campuses[]" id="campus_{{ $campus->id }}" value="{{ $campus->id }}">
                                    <label class="form-check-label" for="campus_{{ $campus->id }}">{{ $campus->name }}</label>
                                </div>
                            @endforeach
                            <x-input-error :messages="$errors->get('campuses')" class="mt-2" />

                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;padding-top: 10px;" for="school">Course School<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                            <select class="form-control" id="school" name="school">
                                <option value="School of education,arts&social sciences">School of education,arts & social sciences</option>
                                <option value="School of business & economics">School of business & economics</option>
                                <option value="School of ICT,media & engineering">School of ICT,media & engineering</option>
                                <option value="ZU TVET Centre">ZU TVET CENTRE</option>
                                <option value="Corporate Academy">Corporate Academy</option>
                                <option value="Centre for professional certifications">Centre for professional certifications</option>
                            </select>
                            <x-input-error :messages="$errors->get('school')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <label style="font-weight: bold;padding-top: 10px;" for="department">Course department<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                            <select class="form-control" id="department" name="department">
                                <option value="Department of Science">Department of Science</option>
                                <option value="Department of Information Technology">Department of Information Technology</option>
                                <option value="Department of Electrical Engineering">Department of Electrical Engineering</option>
                                <option value="Department of Biology">Department of Biology</option>
                                <option value="Department of Business Administratio">Department of Business Administration </option>
                            </select>
                            <x-input-error :messages="$errors->get('department')" class="mt-2" />
                        </div>


                        <div class="form-group">
                            <label style="font-weight: bold;padding-top: 10px;" for="level">Course Level<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                            <select class="form-control" id="level" name="level">
                                <option value="masters">Masters</option>
                                <option value="degree">Degree</option>
                                <option value="diploma">Diploma</option>
                                <option value="certificate">Certificate</option>
                                <option value="professional">professional</option>
                            </select>
                            <x-input-error :messages="$errors->get('level')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center pt-6">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit <i style="font-size: 15px;color: white;" class="bi bi-send-plus"></i></button>
                    <button type="reset" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset <i style="font-size: 15px;color: white;" class="bi bi-arrow-repeat"></i></button>
                </div>
            </form>
        </div>


    </x-slot>
</x-app-layout>
