@extends('layouts.user-details')
	@section('content')

<div class="container">
      <div class="contentdelegation">
      @if($userEvents<1)
        <form name="myDelegationForm" action="{{ route('delegateRegistration') }}" method="post">
          {{ csrf_field() }}

          <input type="hidden" id="inptEventId" name="event_id" value="{{$event->id}}">

          <div class="userEventRegistationInfo">
            <h4 class="userRegistationHeadText">Delegate Registation for {{$event->name}}</h4>
          </div><br><br>
          <div class="row">
            <div class="col-sm-4">
              <h5><B>Committee <span class="text-danger">*</span></B></h5>
                <select class="form-control" name="inptCommittee" id="inptCommitteeUser" required>
                  <option value="">---Select a Committee---</option>
                  @foreach($committeeNames as $committeeName)
                    <option value="{{$committeeName->id}}">{{$committeeName->committee_name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="col-sm-4">
              <h5><b>Country/Chracter/Club <span class="text-danger">*</span></b></h5>
                <select class="chosen-select form-control"  id="inptClub" name="inptCountry" data-placeholder="Choose a country..." required>                    
                </select>
            </div>
            <div class="col-sm-4">
              <h5><B>Previous MUN Experience</B></h5>
                <textarea rows="50" cols="100" class="textareaEvent2" name="inptPreviousMUNExperience" placeholder="Previous MUN Experience"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4">
              <h5><b>Accommodation <span class="text-danger">*</span></b></h5>
              <div class="form-control radio">
                <label class="radio-inline">
                  <input type="radio" value="1" name="inptAccomodation" checked>Yes
                </label>
                <label class="radio-inline">
                  <input type="radio" value="0" name="inptAccomodation">No
                </label>
              </div>
            </div>
            <div class="col-sm-4">
              <h5><b>Food <span class="text-danger">*</span></b></h5>
              <div class="form-control radio">
                <label class="radio-inline">
                  <input type="radio" value="1" name="inptFood" checked>Vegetarian
                </label>
                <label class="radio-inline">
                  <input type="radio" value="0" name="inptFood">Nonvegetarian
                </label>
              </div>
            </div>
            <div class="col-sm-4">
              <h5><b>Visa Requirement <span class="text-danger">*</span></b></h5>
              <div class="form-control radio">
                <label class="radio-inline">
                  <input type="radio" value="1" onclick="selectVisaYes()" name="inptVisa" checked>Yes
                </label>
                <label class="radio-inline">
                  <input type="radio" value="0" onclick="selectVisaNo()" name="inptVisa">No
                </label>
              </div>
            </div>
          </div>

          <div id="visa">
          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <h5><b>Pasport Name</b></h5>
              <input class="form-control" type="text" name="inptPasportName" placeholder="Pasport Name" >
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <h5><b>Pasport Number <span class="text-danger">*</span></b></h5>
              <input class="form-control" type="text" name="inptPasportNumber" placeholder="Pasport Number" required>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <h5><b>Expiry Date</b></h5>
              <input class="form-control" type="date" name="inptExpiryDate" >
            </div>
          </div>

          <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
              <h5><b>Date of Birth <span class="text-danger">*</span></b></h5>
              <input class="form-control" type="date" name="inptDateOfBirth" required>
            </div>
          </div>
          </div>

            <div class="row">
              <div class="col-sm-7">
                <h5><b>Are you willing to perform in the social/cultural event of this conference?</b></h5>
                <div class="form-control radio">
                  <label class="radio-inline">
                  <input type="radio" value="1" onclick="performanceYes()" name="inptWillingness" checked>Yes
                </label>
                <label class="radio-inline">
                  <input type="radio" value="0" onclick="performanceNo()" name="inptWillingness">No
                </label>
                </div>
              </div>
            </div>

            <div id="performance">
            <div class="row">
              <div class="col-sm-4">
                <h5><b>Mention Your performance name</b></h5>
                <input class="form-control" type="text" name="inptPerformanceName" placeholder="performance name">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="margin: 20px 0;">
              
              <button class="btn btn-success text-center">Submit</button>
            </div>
          </div>
        </form>
      @else
        <h1 class="text-success" style="min-height: 200px;">You already registered for {{$event->name}}</h1>
      @endif

      </div>
    </div>

@endsection

@section('footer_script')
  
  <script src="{{ asset('js/chosen.jquery.js') }}"></script>
  <script type="text/javascript">
      var baseUrl = "{{ route('baseUrl') }}";
      $( document ).ready(function () {
        $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});      
        $('#inptCommitteeUser').change(function (event) {

            $("#inptClub").html("");
            $(".chosen-select").trigger("chosen:updated");
             if (this.value != null && this.value !== undefined && this.value !== "") {
                ajUrl = baseUrl+"/get-clubs-by-comm-user-event/"+$("#inptEventId").val()+"/"+this.value
                console.log("URL", ajUrl);
                // return;
                $.ajax({url: ajUrl, success: function(result){
                    var resultData = JSON.parse(result);
                    console.log("Data",JSON.parse(result).length);
                    for (var i = 0; i < resultData.length; i++) {
                        $("#inptClub").append("<option value="+resultData[i].id+">"+resultData[i].club_name+"</option>");
                    }
                    $(".chosen-select").trigger("chosen:updated");


                }});
             }
        })        
      });
  </script>
@endsection