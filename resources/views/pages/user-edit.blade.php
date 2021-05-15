@extends('layouts.user-details')
  @section('content')

    <form name="myForm" action="{{ route('userProfile') }}" method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
        <div class="container">
          <div class="content">
            <div class="row">
              <div class="col-sm-12">
                <div class="userUpdatePersonalInfo">
                  <h4 class="userDetailsHeadText">Update Personal Information</h4>
                </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div id="profileImg">

                      @if($hasProfile)
                        <img src="{{($hasProfile)?URL::asset($data->img_path):''}}" height="160" width="150">
                      @else

                      <img src="{{ URL::asset('images/profile-icon.png') }}" height="130" width="120">

                      @endif
                        <div class="uploadBtn">
                          <input type="file" name="user_photo"  {{($hasProfile)?'':'required'}}>
                        </div>
                      </div>
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><b>Full Name *</b></h5>
                      <input class="form-control" type="text" name="inptFullName" value ="{{ Auth::user()->name }}" placeholder="Full name" required>
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Gender *</b></h5>
                        <select class="form-control" name="gender" required>
                          <option {{($hasProfile && $data['gender'] == 'Male')? 'selected':''}}> Male</option>
                          <option {{($hasProfile && $data['gender'] == 'Female')? 'selected':''}}> Female</option>
                          <option {{($hasProfile && $data['gender'] == 'Other')? 'selected':''}}> Other</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Date of Birth</b></h5>
                        <input class="form-control" type="date" name="inptDateOfBirth" value="{{ ($hasProfile)? $data['dob']:'' }}">
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><b>Country *</b></h5>
                        <select class="form-control" name="inptCountry" required>
                          <option {{ ($hasProfile && $data['country'] == 'Bangladesh' )? 'selected':'' }}> Bangladesh</option>
                          <option {{ ($hasProfile && $data['country'] == 'India' )? 'selected':'' }}> India</option>
                          <option {{ ($hasProfile && $data['country'] == 'Nepal' )? 'selected':'' }}> Nepal</option>
                          <option {{ ($hasProfile && $data['country'] == 'Afghanistan' )? 'selected':'' }}> Afghanistan</option>
                          <option {{ ($hasProfile && $data['country'] == 'Argentina' )? 'selected':'' }}> Argentina</option>
                          <option {{ ($hasProfile && $data['country'] == 'Brazil' )? 'selected':'' }}> Brazil</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Nationality</b></h5>
                      <input class="form-control" type="text" name="inptNationality" value="{{ ($hasProfile)? $data['nationality']:'' }}" placeholder="Nationality">
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Residence Address *</b></h5>
                      <input class="form-control" type="text" name="inptResidenceAddress" placeholder="Residence Address" value="{{ ($hasProfile)? $data['residence_address']:'' }}" required>
                    </div>
                  </div>

                  <div class="row">
                   
                    <div class="col-sm-4">
                      <h5><b>Phone *</b></h5>
                        <input class="form-control" type="text" name="inptPhone" value="{{ ($hasProfile)? $data['phone_no']:'' }}" placeholder="Your phone number" required>
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Emergency Contact Person *</b></h5>
                        <input class="form-control" type="text" name="inptEmergencyContactPerson" value="{{ ($hasProfile)? $data['contact_person_name']:'' }}" placeholder="Guardian name" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><b>Emergency Person Contact No. *</b></h5>
                      <input class="form-control" type="text" name="inptEmergencyPersonContactNo" value="{{ ($hasProfile)? $data['contact_person_phone_no']:'' }}" placeholder="Guardian Emergency Contact No." required>
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Relation with the Aforementioned</b></h5>
                      <input class="form-control" type="text" name="inptRelationWithTheAforementioned" value="{{ ($hasProfile)? $data['relationship']:'' }}" placeholder="Relation with the Aforementioned">
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Passport/Citizenship Number *</b></h5>
                      <input class="form-control" type="text" name="inptPassportNumber" value="{{ ($hasProfile)? $data['passport_no']:'' }}" placeholder="Passport/Citizenship Number" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><b>Facebook Profile Link</b></h5>
                      <input class="form-control" type="text" name="inptFacebookProfileLink" value="{{ ($hasProfile)? $data['facebook_profile']:'' }}" placeholder="Facebook Profile Link">
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

    <!-- Academic Information -->
    <div class="container">
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="userUpdateAcademicInfo">
              <h4 class="userDetailsHeadText">Academic Information</h4>
            </div>

              <div class="row" style="margin-top: 10px;">
                <div class="col-sm-4">
                  <h5><b>Academic Qualification</b></h5>
                  <input class="form-control" type="text" name="inptAcademicQualification" placeholder="Academic Qualification" value="{{ ($hasProfile)? $data['academic_qualification']:'' }}">
                </div>
                <div class="col-sm-4">
                  <h5><b>University/HighSchool/Institution</b></h5>
                  <input class="form-control" type="text" name="inptUniversity" placeholder="University/HighSchool/Institution" value="{{ ($hasProfile)? $data['university_name']:'' }}">
                </div>
                <div class="col-sm-4">
                  <h5><b>Address</b></h5>
                  <input class="form-control" type="text" name="inptUniversityAddress" placeholder="Address" value="{{ ($hasProfile)? $data['university_address']:'' }}">
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <h5><b>Field Of Study</b></h5>
                  <input class="form-control" type="text" name="inptFieldOfStudy" placeholder="Field Of Study" value="{{ ($hasProfile)? $data['study_field']:'' }}">
                </div>
                <div class="col-sm-4">
                  <h5><b>Current year/Semester</b></h5>
                  <input class="form-control" type="text" name="inptCurrentYearSemester" placeholder="Current year/Semester" value="{{ ($hasProfile)? $data['current_semester']:'' }}">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Medical Information -->
    <div class="container">
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="userUpdateMedicalInfo">
              <h4 class="userDetailsHeadText">Medical Information</h4>
            </div>

              <div class="row">
                <div class="col-sm-12">
                  <h5><b>Please list your medical conditions and medical arrangements the organizers should be aware of:</b></h5>
                  <textarea rows="50" cols="100" class="textareaUpdateProfile" name="inptMedicalCondition"  value="">{{ ($hasProfile)? $data['medical_condition']:'' }}</textarea>
                </div>
                <div class="col-sm-12">
                  <h5><b>Food allergies(if any) and/or Preference:</b></h5>
                  <textarea rows="50" cols="100" class="textareaUpdateProfile" name="inptAllergiesOrPreference"  value="">{{ ($hasProfile)? $data['allergies_preference']:'' }}</textarea>
                </div>
              </div>
               <br>
              <button class="btn btn-primary" type="submit" name="submit">Update</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection