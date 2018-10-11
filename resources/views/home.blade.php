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
                          <?php 
                            $users = DB::table('users')
                            ->where( 'id', '!=', Auth::user()->id)
                            ->orderBy('name', 'desc')
                            ->get();
                          ?>
                          @foreach($users as $user)
                            <div>
                              <span><a class="flex1 name" data-toggle="tab" href="#{{$user->id}}">{{$user->name}}</a></span>
                            </div>
                          @endforeach
                      </div>

                      

                    </div>
                    <div class="col-md-8 message">
                        <div class="tab-content">
                           <br>
                             @if(count($users) > 0)
                                  @foreach($users as $user)
                                   
                                      <div id="{{$user->id}}" class="tab-pane fade message_section">
                                          <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
                                             {{ csrf_field() }}

                                             <?php 
                                                 $chats = DB::table('messages')
                                                 ->Where('SenderId' , $user->name )
                                                 ->Where('RecieverId' , Auth::user()->name )

                                                 ->orWhere('RecieverId' , $user->name )
                                                 ->Where('SenderId' , Auth::user()->name )
                                                 ->get(); 
                                              ?>

                                              @if(count($chats) <= 0)
                                                  <h4>No Conversation yet with <span class="user-color">{{$user->name}}</span> !!!</h4>
                                              @else

                                                 @foreach($chats as $chat)
                                                    @if($chat->SenderId == Auth::user()->name )
                                                      <div class="text-right flex-parent">
                                                        <div class="flex1"></div>
                                                        <div class="flex1">
                                                            <small>{{ $chat->SenderId }}</small>
                                                            <p class="indent chat-message mychat" style="color: darkblue;">{{ $chat->Message }}</p>
                                                        </div>
                                                      </div>
                                                    @else
                                                     <div class="text-left flex-parent">
                                                          <div class="flex1">
                                                              <small>{{ $chat->SenderId }}</small>
                                                              <p class="indent chat-message thierchat">{{ $chat->Message }}</p>
                                                          </div>
                                                          <div class="flex1"></div>
                                                      </div>
                                                    @endif
                                                  @endforeach

                                              @endif
                                             
                                               
                                                  <br>
                                                  <br>
                                              <div class="inset_message">
                                                <input type="hidden" name="sender" value="{{ Auth::user()->name }}">
                                                <input type="hidden" name="reciever" value="{{ $user->name }}">
                                                <input class="form-control" type="text" name="message" placeholder="Enter your message here!!">
                                                <div class="text-right">
                                                  <br>
                                                <input class="btn btn-info" type="submit" name="send" value="Send Message">
                                                </div>
                                              </div>
                                              <br>
                                          </form>
                                      </div>
                                    
                                  @endforeach
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
