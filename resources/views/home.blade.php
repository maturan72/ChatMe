@extends('layouts.app')

@section('content')
<div class="container home">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chat Me</div>

                <div class="panel-body">
                    <div class="col-md-4">

                      <div class="users">
                        <h4 class="text-center">All UserS</h4>
                          
                            <div>
                              <span><a class="flex1 name" data-toggle="tab" href="#message">Chat</a></span>
                            </div>
                          
                      </div>

                      

                    </div>
                    <div class="col-md-8 message">
                        <div class="tab-content">
                            <h4>Message Now</h4>
                           <br>
                            
                          <div id="message" class="tab-pane fade message_section">
                              <form action="" method="POST" enctype="multipart/form-data">
                                 {{ csrf_field() }}


                                    <br>
                                  <div class="inset_message">
                                    <input type="hidden" name="sender" value="">
                                    <input type="hidden" name="reciever" value="">
                                    <input class="form-control" type="text" name="message" placeholder="Enter your message here!!">
                                    <div class="text-right">
                                      <br>
                                    <input class="btn btn-info" type="submit" name="send" value="Send Message">
                                    </div>
                                  </div>
                                  <br>
                              </form>
                          </div>
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
