@extends('layouts.app')

@section('content')
  
  <div class="container" id="page">
    <div id="header">
      <div id="logo">
        <a href="#">
          <img src="./images/logo_hyd.png" height="70" width="75">
        </a>
        House of Youth Dialogue (HYD)
      </div>
      <div id="tag">Online Conference Management System</div>
      <div class="clear"></div>
    </div>

    <div class="container">
      <div class="content">
        <div class="row">
          <div class="col-sm-12">
            <div class="userDetailsHead">
              <h4 class="userDetailsHeadText">USER DETAILS</h4>
            </div>
            <div id="profileImg">
              <img src="images/profile.jpg" height="130" width="120">
            </div>
            <div>
              <a href="update_profile.html"><button class="btn btn-primary updateBtn">Update Profile</button></a>
            </div>
            <div class="progressBar">
              <p class="progressBarText">90%</p>
            </div>
            <!-- <div class="dropdown notificationBtn">
              <a href="#" class="btn-lg dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
              </a>
              <!-- <span class="badge notification">7</span> -->
            </div> -->
            <div id="profileImgTag">Name: &nbsp; {{ Auth::user()->name }}<br>Email: &nbsp; {{ Auth::user()->email }}<br>Phone: </div>
            <div class="UserTable">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Conferrence</th>
                    <th>Country</th>
                    <th>Committee</th>
                    <th>Payment</th>
                    <th>Award</th>
                    <th>Documents</th>
                    <th>Notice</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td>Bangladesh</td>
                    <td>Marvel-DC</td>
                    <td>Paid</td>
                    <td>Yes</td>
                    <td>Download</td>
                    <td>Download pdf</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div>
          <button class="btn btn-danger eventBtn">Delegate Registration for LORD MUN DHAKA-2018</button>
        </div>
        <div>
          <button class="btn btn-warning eventBtn">Delegate Registration for SDG MUN INDIA-2018</button>
        </div>
      </div>
    </div>


                      <!-- ======= Update Profile ======= -->


    <form name="myForm" action="myScript.js" onsubmit="return validateForm()" method="post">
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
                      <input class="form-control" type="text" name="inptFullName" placeholder="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Sex *</B></h5>
                        <select class="form-control" name="inptSex" required>
                          <option> Male</option>
                          <option> Female</option>
                          <option> Other</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Date of Birth</B></h5>
                        <input class="form-control" type="date" name="inptDateOfBirth">
                    </div>
                  </div> 

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><B>Country *</B></h5>
                        <select class="form-control" name="inptCountry" required>
                          <option> Choose your country</option>
                          <option> Bangladesh</option>
                          <option> India</option>
                          <option> Nepal</option>
                          <option> Afghanistan</option>
                          <option> Argentina</option>
                          <option> Belize</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Nationality</B></h5>
                      <input class="form-control" type="text" name="inptNationality" placeholder="Nationality">
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Residence Address *</B></h5>
                      <input class="form-control" type="text" name="inpResidenceAddress" placeholder="Residence Address" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <h5><B>Email *</B></h5>
                      <input class="form-control" type="Email" name="inptEmail" placeholder="Your email" required>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Phone *</B></h5>
                        <input class="form-control" type="text" name="inptPhone" placeholder="Your phone number" required>
                    </div>
                    <div class="col-sm-4">
                      <h5><B>Emergency Contact Person *</B></h5>
                        <input class="form-control" type="text" name="inptEmergencyContact" placeholder="Guardian name" required>
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
                      <input class="form-control" type="text" name="inptPassport/CitizenshipNumber" placeholder="Passport/Citizenship Number">
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
                  <textarea rows="50" cols="100" name="inptMedicalCondition" placeholder="Medical Condition"></textarea>
                </div>
                <div class="col-sm-12">
                  <h5><b>Food allergies(if any) and/or Preference:</b></h5>
                  <textarea rows="50" cols="100" name="inptAllergiesOrPreference" placeholder="Allergies or Preference"></textarea>
                </div>
              </div>
               <br>
              <input class="btn btn-primary" type="submit" name="submit">
          </div>
        </div>
      </div>
    </div>


    <div class="row">
            <div class="col-sm-12">
              <h5><b>Are you an individual or a representation of a group delegation?</b></h5>
              <input type="radio" name="inptGender" onclick="selecSingletDelegation()" value="yes" required> Single  
              <input type="radio" name="inptGender" onclick="selectGroupDelegation()" value="no" required> Group <br><br>
              <P><strong>Important: </strong>Even if you are applying as a group delegation, each applicant should fill the individual delegate form.</P>
            </div>
          </div>

          <div id="groupDelegation" style="display: none;">
          <div class="row">
            <div class="col-sm-8">
              <h5><b>Enter the name of group (Institute's Name, MUN affiliation or club):</b></h5>
              <input class="form-control" type="text" name="inptGroupName" placeholder="Enter the name of group">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-8">
              <h5><b>How many delegates are there? (Max: 10):</b></h5>
              <input class="form-control" type="text" name="inptDelegatesNumber" placeholder="Number of delegates">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <h5><b>Kindly state the name, Address, Nationality, University and Level of Study of your co-applicants separated by commas:</b></h5>
              <textarea rows="50" cols="100" name="inptMedicalCondition" placeholder="Details"></textarea>
            </div>
          </div>
          </div>

          <div class="userEventRegistationInfo">
            <h4 class="userRegistationHeadText">Delegate Registation for LORD MUN Dhaka</h4>
          </div><br><br>
          <div class="row">
            <div class="col-sm-4">
              <h5><B>Committee *</B></h5>
                <select class="form-control" name="inptCommittee" required>
                  <option></option>
                  <option> Game of Throne</option>
                  <option> Marvel-DC</option>
                  <option> Harry Potter</option>
                  <option> International Cricket Club Alliance</option>
                  <option> Continues Crisis Committee</option>
                </select>
            </div>
            <div class="col-sm-4">
              <h5><B>Country/Chracter/Club *</B></h5>
                <select class="form-control" name="inptCountry" required>
                  <option></option>
                  <option> Bangladesh</option>
                  <option> India</option>
                  <option> Nepal</option>
                </select>
            </div>
            <div class="col-sm-4">
              <h5><B>Date of Birth</B></h5>
                <input class="form-control" type="date" name="inptDateOfBirth">
            </div>
          </div>

  </form>



    <div id="footer">
      Copyright © 2018 House of Youth Dialogue (HYD). <br>
      All Rights Reserved.
    </div>
  </div>

@endsection