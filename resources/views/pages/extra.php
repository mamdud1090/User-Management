
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- <link href="{{ asset('css/chosen.min.css') }}" rel="stylesheet"> -->

<!-- <script src="{{ asset('js/chosen.jquery.js') }}"></script> -->
<script type="text/javascript">
    var baseUrl = "{{ route('baseUrl') }}";
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
    })
</script>



<td>{{$conference->country}}</td>

        <!-- For user-admin.php -->

<td>{{$allUser->country}}</td>


{{ Form::checkbox('Paid', $conference->payment_status, false) }}
                        {{$conference->payment_status}}



public function committeeWiseUser($id){

        $committeeWiseUsers = DB::table('event_registration')
                    ->join('committee', 'event_registration.committee_id', '=', 'committee.id')
                    ->join('users', 'event_registration.user_id', '=', 'users.id')
                    ->join('events', 'event_registration.event_id', '=', 'events.id')
                    ->select('events.name as eventName', 'users.name','committee.committee_name')
                    ->where('event_registration.committee_id' , 17)
                   
                    ->get();

        // echo'<pre>';

        // var_dump($committeeWiseUsers);

        // die();

        $data['committeeWiseUsers'] = $committeeWiseUsers;

        return view('pages.committee-wise-user');
    }




<td class="paymentStatus">{{ Form::checkbox('paymentStatus', 1, $allUser->payment_status, array('disabled'))}}</td>
                                <td></td>


                                <?php
                                       echo Form::open(array('url' => '/uploadfile','files'=>'true'));
                                       echo 'Select the file to upload.';
                                       echo Form::file('file');
                                       echo Form::submit('Upload File');
                                       echo Form::close();
                                    ?>


<div class="col-sm-2">
            <div id="profileImg"><img src="{{($userProfile)?URL::asset($userProfile->img_path):''}}" height="130" width="120">
            </div>
          </div>


          <td></td>
                    <td><a href="{{ url('/') }}/{{$conference->file_path}}">{{ url('/') }}/{{$conference->file_path}}</a></td>




         $data['conferences'] = DB::table('event_registration')
                            ->join('events', 'event_registration.event_id', '=', 'events.id')
                            ->join('committee', 'event_registration.committee_id' , '=', 'committee.id')
                            ->join('clubs', 'event_registration.club_id' , '=', 'clubs.id')
                            ->join('notice_upload', 'event_registration.committee_id' , '=', 'notice_upload.committee_id')

                            ->select('events.name','event_registration.event_id','committee.committee_name','clubs.club_name','event_registration.payment_status','notice_upload.file_path')
                            ->where('event_registration.user_id' , $user_id)
                            ->get();


