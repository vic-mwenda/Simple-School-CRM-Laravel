<x-app-layout>

    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Create an Inquiry') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Lodge inquiries from customers into our system') }}
            </p>
        </header>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <form method="post" action="{{route("manageinquiry.store")}}">
                    @csrf

                    <div class="d-flex justify-content-center bg-[#012970] align-items-center">
                        <h3 style="color: white;padding-top: 7px;font-size: 22px;font-weight: bold;">1. Contact Details</h3>
                    </div>
                    <div class="row container ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight: bold;padding-top: 10px;" for="fullName">Full Name<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                                <input type="text" class="form-control" name="name" id="fullName" value="{{ old('name') }}" placeholder="Enter the full name">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold;padding-top: 10px;" for="email">Email Address<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter the email address">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold;padding-top: 10px;" for="phone">Phone Number<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Enter the phone number">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold;padding-top: 10px;" for="dob">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" id="dob">
                                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label style="font-weight: bold;padding-top: 10px;" for="gender">Gender<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Prefer not to say</option>
                                </select>
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>
                    </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label style="font-weight: bold;padding-top: 10px;" for="country"><i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i>Country</label>
                                        <select class="form-control" name="country">
                                          @foreach ($countries as $country)
                                                <option value="{{ $country->cca3}}">{{$country->name->common}}</option>
                                          @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;padding-top: 10px;" for="state"><i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i>County/State</label>
                                        <select name="state" class="form-control" id="state">
                                            <option value="">Select State</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;padding-top: 10px;" for="city">City/Town</label>
                                        <input type="text" class="form-control" id="city" value="{{ old('town') }}" name="town" placeholder="Enter your city">
                                        <x-input-error :messages="$errors->get('town')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <label style="font-weight: bold;padding-top: 10px;" for="postalCode">Postal Code</label>
                                        <input type="text" class="form-control" id="postalCode" name="postal_code" value="{{ old('postal_code') }}" placeholder="Enter the postal code">
                                        <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                                    </div>
                                  </div>
                            </div>
                    <div class="d-flex justify-content-center bg-[#012970] align-items-center mt-6">
                        <h3 style="color: white;padding-top: 7px;font-size: 22px;font-weight: bold;">2. Inquiry Details</h3>
                    </div>
                    <div class="row container ">
                        <div class="col-md-6">
                            <div class="form-group pt-2">
                               <label for="inquiryType" class="fw-bold">Inquiry Type<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                               <select class="form-control" id="inquiryType" name="category">
                                  <option value="general">General Inquiry</option>
                                  <option value="course">Course Inquiry</option>
                               </select>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>
                            <div class="form-group pt-2">
                               <label class="fw-bold" for="subject">Subject<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                               <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="Enter the subject of your inquiry">
                                <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group pt-2" id="courseNameField" style="display: none;">
                                <label class="fw-bold" for="courseName">Course Name<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label>
                                <input class="form-control" list="datalistOptions" id="courseName" name="course_name" value="{{ old('course_name') }}" placeholder="Enter course name">
                                <datalist id="datalistOptions">
                                    @foreach($courses as $course)
                                        <option value="{{$course->course_name}}">{{$course->course_name}}</option>
                                    @endforeach
                                </datalist>
                                <x-input-error :messages="$errors->get('course_name')" class="mt-2" />
                            </div>
                            <div class="form-group pt-2">
                                <label class="fw-bold" for="message">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="5" value="{{ old('message') }}" placeholder="Enter your message"></textarea>
                                <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            </div>
                        </div>
                </div>
                    <div class="d-flex justify-content-center bg-[#012970] align-items-center mt-6">
                        <h3 style="color: white;padding-top: 7px;font-size: 22px;font-weight: bold;">3. Additional Information</h3>
                    </div>
                    <div class="row container ">
                        <div class="col-md-6">
                            <div class="form-group pt-2">
                                <label class="fw-bold" for="educationLevel">Highest Level of Education</label>
                                <select class="form-control" name="education_level" id="educationLevel">
                                    <option value="highSchool">High School</option>
                                    <option value="bachelors">Bachelor's Degree</option>
                                    <option value="masters">Master's Degree</option>
                                    <option value="doctorate">Doctorate</option>
                                    <option value="other">Other</option>
                                </select>
                                <x-input-error :messages="$errors->get('education_level')" class="mt-2" />
                            </div>
                            <div class="form-group pt-2">
                                <label class="fw-bold" for="hearAboutUs">How did you hear about us?<i style="font-size: 7px;float: right;color: red" class="bi bi-asterisk"></i></label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="how_did_you_hear" id="website" value="website">
                                    <label class="form-check-label" for="website">Website</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="how_did_you_hear" id="socialMedia" value="socialMedia">
                                    <label class="form-check-label" for="socialMedia">Social Media</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="how_did_you_hear" id="friendsFamily" value="friendsFamily">
                                    <label class="form-check-label" for="friendsFamily">Friends/Family</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="how_did_you_hear" id="onlineAdvertisement" value="onlineAdvertisement">
                                    <label class="form-check-label" for="onlineAdvertisement">Online Advertisement</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="how_did_you_hear" id="printAdvertisement" value="printAdvertisement">
                                    <label class="form-check-label" for="printAdvertisement">Print Advertisement</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="how_did_you_hear" id="other" value="other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group pt-2">
                                <label class="fw-bold" for="institutionAttended">Current or Last Institution Attended</label>
                                <input type="text" class="form-control" name="institution_attended" value="{{ old('institution_attended') }}" id="institutionAttended" placeholder="Enter the institution name">
                                <x-input-error :messages="$errors->get('institution_attended')" class="mt-2" />
                            </div>

                            <div class="form-group pt-2">
                                <label class="fw-bold" for="FieldOfStudy">Field of Study</label>
                                <select class="form-control" id="FieldOfStudy" name="field_of_study">
                                    <option value="Technology and Science">Technology and Science</option>
                                    <option value="Education">Education</option>
                                    <option value="Business">Business</option>
                                    <option value="Media">Media</option>
                                    <option value="other">Other</option>
                                </select>
                                <x-input-error :messages="$errors->get('field_of_study')" class="mt-2" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-4 d-flex justify-content-center ">
                        <label class="fw-bold" for="consentTerms">I agree to receiving updates on new courses and offers:</label>
                        <input type="checkbox" class="form-check-input" id="consentTerms" name="consent_terms" value=1 checked>
                        <x-input-error :messages="$errors->get('consent_terms')" class="mt-2" />
                    </div>

                    <div class="d-flex justify-content-center pt-6">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit <i style="font-size: 15px;color: white;" class="bi bi-send-plus"></i></button>
                        <button type="reset" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset <i style="font-size: 15px;color: white;" class="bi bi-arrow-repeat"></i></button>
                    </div>
                </form>
            </div>
    </section>
    <script>
        const inquiryTypeDropdown = document.getElementById("inquiryType");
        const courseNameField = document.getElementById("courseNameField");

        inquiryTypeDropdown.addEventListener("change", function() {
            if (this.value === "course") {
                courseNameField.style.display = "block";
            } else {
                courseNameField.style.display = "none";
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function getStates(countryCode) {
                $.ajax({
                    url: "{{ url('/get-states') }}",
                    type: 'GET',
                    data: { country: countryCode },
                    success: function(response) {
                        $('select[name="state"]').empty();

                        $.each(response.states, function(key, value) {
                            $('select[name="state"]').append($('<option>').val(value.iso_3166_2).text(value.name));
                        });
                    }
                });
            }

            // Listen for changes in the selected country
            $('select[name="country"]').on('change', function() {
                const countryCode = $(this).val();

                // Get states based on the selected country
                getStates(countryCode);
            });
        });
    </script>

</x-app-layout>
