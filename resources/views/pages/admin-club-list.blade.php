@extends('layouts.admin-panel')
	@section('content')

  <hr>
  

	<div class="container">
   @if(Session::has('status'))
            <p class="alert alert-success">{{ Session::get('status') }}</p>
   @endif

   @if(Session::has('duplicateClubStatus'))
            <p class="alert alert-danger">{{ Session::get('duplicateClubStatus') }}</p>
   @endif

   duplicate-club-status
      <div class="contentLogin">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 loginDiv">
          <div class="panel panel-default">
              <div class="panel-heading">
                  List of Club
              </div>

              <form name="myForm" action="{{ route('clubCRUD') }}" method="post" enctype="multipart/ form-data">
                    {{ csrf_field() }}

                      <div class="container">
                        <div class="row">
                          <div class="col-md-8 addClubInput">
                            <input type="text" name="createClub">
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
                        <th class="tableHead">Club name</th>
                        <th class="tableHead">Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                  	@foreach($clubNames as $clubName)


	                    <tr class="odd gradeX">
	                      <td>{{$clubName->club_name}}</td>
	                      <td align="center">
	                        <!-- <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-plus-sign"></span></button> -->

	                        <a href="{{ route('club-edit',$clubName->id)}}"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span></button></a>

	                        <a href="{{ route('club-delete',$clubName->id)}}"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></a>
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