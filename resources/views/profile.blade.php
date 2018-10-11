@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                     <div class="table-responsive">          
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <br>
                                <?php 
                                   $images = DB::table('profiles')
                                   ->Where('userId' , Auth::user()->id )
                                   ->get(); 
                                ?>

                                  @if(count($images) > 0)
                                      @foreach($images as $image)
                                          <img id="profile" src="{{ $image->profileImage }}">
                                      @endforeach
                                  @else
                                      <img id="profile" src="{{ asset('images/avatar.jpg') }}">
                                   
                                  @endif
                            </td>
                            <td>
                              <br>
                              {{ Auth::user()->name }}</td>
                            <td>
                              <br>
                              {{ Auth::user()->email }}</td>
                            <td>
                              <br>
                              <form class="form-horizontal" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                         <div class="text-right">
                                            <div class="modal_camera">
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" onClick="preview_snapshot()" class="btn btn-default" data-toggle="modal" data-target="#camera">Add A Photo</button>

                                                <!-- Modal -->
                                                <div id="camera" class="modal fade text-center" role="dialog">
                                                  <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Capture Image</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                       <div id="my_camera"></div>
                                                       <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                                       <div id="profileImage"></div>
                                                        <div id="pre_take_buttons">
                                                          <input type=button value="Take Snapshot" onClick="preview_snapshot()">
                                                        </div>
                                                        <br>
                                                        <div id="post_take_buttons" style="display:none">
                                                          <input type=button value="Capture" onClick="save_photo()" style="font-weight:bold;">
                                                          <input type="submit" name="save" value="Save Photo" style="font-weight:bold;">
                                                        </div>
                                                      </div>
                                                     <!--  <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                      </div> -->
                                                    </div>

                                                  </div>
                                                </div>        
                                            </div>
                                        </div>
                                </form>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


                   