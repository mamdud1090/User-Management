@extends('layouts.admin-panel')
@section('content')

  

  <div class="container">
     @if(Session::has('club-committee-status'))
         <p class="alert alert-success">{{ Session::get('club-committee-status') }}</p>
     @endif
      <div class="contentLogin">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 loginDiv">
          <form name="myForm" action="{{ route('clubNcommittee') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="inptEventId" id="inptEventId" value="{{$event_id}}">
              <h5><B>Committee:</B></h5>
                <select class="form-control" name="inptCommittee" id="inptCommittee" required>
                    <option value="">---Select a Committee---</option>
                  @foreach($committees as $committee)
                        <option value="{{$committee->id}}">{{$committee->committee_name}}</option>
                  @endforeach
                </select>



              <h5><B>Country/Chracter/Club:</B></h5>
             
                <select class="chosen-select form-control" id="inptClub" name="inptClub[]" required data-placeholder="Choose a country..." multiple class="chosen-select">
                </select>

                <div class="adminSubmitBtn">
                  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </div>

              </div>          
          </form>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>

@endsection
@section('footer_script')
  
  <script src="{{ asset('js/chosen.jquery.js') }}"></script>
  <script type="text/javascript">
      var baseUrl = "{{ route('baseUrl') }}";
      $( document ).ready(function () {
        
          $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});
          $('#inptCommittee').change(function (event) {

              $("#inptClub").html("");
              $(".chosen-select").trigger("chosen:updated");
               if (this.value != null && this.value !== undefined && this.value !== "") {
                  ajUrl = baseUrl+"/get-clubs-by-comm-event/"+$("#inptEventId").val()+"/"+this.value
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
          });
      });
  </script>
@endsection