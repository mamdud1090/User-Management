@extends('layouts.user-details')
	@section('content')

		<form name="myForm" action="{{ route('userProfile') }}" method="post">
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
                      <h5><B>Full Name *</B></h5>
                      <input class="form-control" type="text" name="inptFullName" value ="{{ Auth::user()->name }}"  placeholder="Full name" required>
                      
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Gender *</B></h5>
                        <select class="form-control" name="gender" required>
                          <option> Male</option>
                          <option> Female</option>
                          <option> Other</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Date of Birth</B></h5>
                        <input class="form-control" type="date" name="inptDateOfBirth" value="{{ ($hasProfile)? $data['dob']:'' }}">
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><B>Country *</B></h5>
                        <select class="form-control" name="inptCountry" required>
                          <option {{ ($hasProfile && $data['country'] == 'Bangladesh' )? 'selected':'' }}> Bangladesh</option>
                          <option {{ ($hasProfile && $data['country'] == 'India' )? 'selected':'' }}> India</option>
                          <option {{ ($hasProfile && $data['country'] == 'Nepal' )? 'selected':'' }}> Nepal</option>
                          <option {{ ($hasProfile && $data['country'] == 'Afghanistan' )? 'selected':'' }}> Afghanistan</option>
                          <option {{ ($hasProfile && $data['country'] == 'Argentina' )? 'selected':'' }}> Argentina</option>
                          <option {{ ($hasProfile && $data['country'] == 'Belize' )? 'selected':'' }}> Belize</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Nationality</B></h5>
                      <input class="form-control" type="text" value="{{ ($hasProfile)? $data['nationality']:'' }}" name="inptNationality" placeholder="Nationality">
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Residence Address *</B></h5>
                      <input class="form-control" type="text" name="inptResidenceAddress" placeholder="Residence Address" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><B>Email *</B></h5>
                      <input class="form-control" type="Email" name="inptEmail" value ="{{ Auth::user()->email }}" placeholder="Your email" required>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Phone *</B></h5>
                        <input class="form-control" type="text" name="inptPhone" placeholder="Your phone number" required>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Emergency Contact Person *</B></h5>
                        <input class="form-control" type="text" name="inptEmergencyContactPerson" placeholder="Guardian name" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><b>Emergency Person Contact No. *</b></h5>
                      <input class="form-control" type="text" name="inptEmergencyPersonContactNo" placeholder="Guardian Emergency Contact No." required>
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Relation with the Aforementioned</b></h5>
                      <input class="form-control" type="text" name="inptRelationWithTheAforementioned" placeholder="Relation with the Aforementioned">
                    </div>
                    <div class="col-sm-4">
                      <h5><b>Passport/Citizenship Number</b></h5>
                      <input class="form-control" type="text" name="inptPassport_CitizenshipNumber" placeholder="Passport/Citizenship Number">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><b>Facebook Profile Link</b></h5>
                      <input class="form-control" type="text" name="inptFacebookProfileLink" placeholder="Facebook Profile Link">
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
            <div class="userUpdatePersonalInfo">
              <h4 class="userDetailsHeadText">Academic Information</h4>
            </div>

              <div class="row">
                <div class="col-sm-4">
                  <h5><B>Academic Qualification</B></h5>
                  <input class="form-control" type="text" name="inptAcademicQualification" placeholder="Academic Qualification">
                </div>
                <div class="col-sm-4">
                  <h5><B>University/HighSchool/Institution</B></h5>
                  <input class="form-control" type="text" name="inptUniversity" placeholder="University/HighSchool/Institution">
                </div>
                <div class="col-sm-4">
                  <h5><B>Address</B></h5>
                  <input class="form-control" type="text" name="inptAddress" placeholder="Address">
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <h5><b>Field Of Study</b></h5>
                  <input class="form-control" type="text" name="inptFieldOfStudy" placeholder="Field Of Study">
                </div>
                <div class="col-sm-4">
                  <h5><b>Current year/Semester</b></h5>
                  <input class="form-control" type="text" name="inptCurrentyear/Semester" placeholder="Current year/Semester">
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
            <div class="userUpdatePersonalInfo">
              <h4 class="userDetailsHeadText">Medical Information</h4>
            </div>

              <div class="row">
                <div class="col-sm-12">
                  <h5><b>Please list your medical conditions and medical arrangements the organizers should be aware of:</b></h5>
                  <textarea rows="50" cols="100" class="textareaUpdateProfile" name="inptMedicalCondition" placeholder="Medical Condition"></textarea>
                </div>
                <div class="col-sm-12">
                  <h5><b>Food allergies(if any) and/or Preference:</b></h5>
                  <textarea rows="50" cols="100" class="textareaUpdateProfile" name="inptAllergiesOrPreference" placeholder="Allergies or Preference"></textarea>
                </div>
              </div>
               <br>
              <button class="btn btn-primary" type="submit" name="submit" value="Add">Update</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection