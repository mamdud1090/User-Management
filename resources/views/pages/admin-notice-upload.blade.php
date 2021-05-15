@extends('layouts.admin-panel')
@section('content')



		<div class="container">
			<div class="row">

		<form name="myForm" action="{{ route('committeeWiseUpload') }}" method="post" enctype="multipart/form-data">
		 	{{ csrf_field() }}
      <div class="form-group">
        
          <h5><b>Event:</b></h5>
          <select class="form-control" name="inptEvent" id="inptEventUser">
            <option value="">-----Select an event-----</option>
            @foreach($eventNames as $eventName)
              <option value="{{$eventName->id}}">{{$eventName->name}}</option>
          @endforeach
          </select>
      </div>

      <div class="form-group">
          <h5><b>Committee <span class="text-danger">*</span></b></h5>
                <select class="form-control" name="inptCommittee" id="inptCommitteeUser" required>
                </select>
      </div>
      <div class="form-group form-inline">
          <input class="form-control" type="file" name="adminNotice" required>
          <br/>
          <br/>
          <button class="btn btn-primary" type="submit" name="submit">Upload</button>
      </div>

        </form>
                

            </div>
        </div>

@endsection



@section('footer_script')
  <script src="{{ asset('js/chosen.jquery.js') }}"></script>
  <script type="text/javascript">
      var baseUrl = "{{ route('baseUrl') }}";
      $( document ).ready(function () {      
        $('#inptEventUser').change(function (event) {

            $("#inptCommitteeUser").html("");
             if (this.value != null && this.value !== undefined && this.value !== "") {
                ajUrl = baseUrl+"/get-committee-by-user-event/"+this.value;
                // return;
                $.ajax({url: ajUrl, success: function(result){
                    var resultData = JSON.parse(result);
                    for (var i = 0; i < resultData.length; i++) {
                        $("#inptCommitteeUser").append("<option value="+resultData[i].id+">"+resultData[i].committee_name+"</option>");
                    }


                }});
            }
        })        
      });
  </script>
@endsection