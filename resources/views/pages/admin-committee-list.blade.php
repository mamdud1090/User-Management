@extends('layouts.admin-panel')
	@section('content')


<hr>


   

	<div class="container">
   @if(Session::has('committee-store-status'))
            <p class="alert alert-success">{{ Session::get('committee-store-status') }}</p>
   @endif 
      <div class="contentLogin">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 loginDiv">
          

          <div class="panel panel-default">
              <div class="panel-heading">
                  List of Committee
              </div>


                    <form name="myForm" action="{{ route('committeeCRUD') }}" method="post" enctype="multipart/ form-data">
                    {{ csrf_field() }}

                      <div class="container">
                        <div class="row">
                          <div class="col-md-8 addCommitteeInput">
                            <input type="text" name="createCommittee" required>
                          </div>

                          <div class="col-md-4">
                            <button class="btn btn-success" type="submit" name="submit">Add new</button>
                          </div>
                        </div>
                      </div>

                    </form>
              

              <div class="panel-body">

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                      <tr>
                        <th class="tableHead">Committee name</th>
                        <th class="tableHead">Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                  	@foreach($committeeNames as $committeeName)
	                    <tr class="odd gradeX">
	                      <td>{{$committeeName->committee_name}}</td>
	                      <td align="center">
	                        <!-- <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" ><span class="glyphicon glyphicon-plus-sign"></span></button> -->

	                        <a href="{{ route('committee-edit',$committeeName->id) }}"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span></button></a>

	                        <a href="{{route('committee-delete',$committeeName->id)}}"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></a>
	                      </td>
	                    </tr>
	                  @endforeach
              

                  </tbody>
                </table>
              </div>
          </div>
        </div>
        <div class="col-sm-1"></div>
      </div>
    </div>
@endsection