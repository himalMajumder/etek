@extends('frontend.user_master')
@section('content')

<div class="col-lg-12 col-xl-9 col-12">

    <div class="dashboard-ticket-converstion mgTop24">
        <div class="dashboard-head-widget style-2 m-0">
            <h5 class="dashboard-head-widget-title">
                {{$supportTicket->subject}}
            </h5>
            <div class="dashboard-head-widget-btn">
                <a class="theme-btn secondary-btn icon-right" href="{{route('support.ticket')}}"><i class="fi-rr-arrow-left"></i>Back</a>
            </div>
        </div>
        <div class="ticket-converstion-main">
            <div style="height: 600px; overflow-y: scroll" id="div1">

                <div class="ticket-converstion-widget user-conversation">
                    <div class="ticket-converstion-widget-img">
                        @if($supportTicket->user_image)
                        <img alt="" src="{{url(env('ADMIN_URL').'/'.$supportTicket->user_image)}}">
                        @endif
                    </div>
                    <div class="ticket-converstion-widget-info">
                        <div class="ticket-converstion-widget-info-head">
                            <h5>{{$supportTicket->user_name}}</h5>
                            <div class="ticket-converstion-widget-info-date">
                                <span>{{ date('jS M, Y h:i A', strtotime($supportTicket->created_at)) }}</span>
                            </div>
                        </div>
                        <div class="ticket-converstion-info-body">
                            <p class="ticket-converstion-info-body-text">
                                {{$supportTicket->message}}
                            </p>

                            @if($supportTicket->attachment)
                            <div class="ticket-converstion-info-body-images">
                                <div class="ticket-converstion-info-body-single-img">
                                    <a href="{{url(env('ADMIN_URL').'/'.$supportTicket->attachment)}}" data-fancybox="photo" class="image-view-btn">
                                        <img src="{{url(env('ADMIN_URL').'/'.$supportTicket->attachment)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>

                @foreach ($supportTicketMessages as $supportTicketMessage)
                @if($supportTicketMessage->sender_type == 1)
                <div class="ticket-converstion-widget admin-conversation">
                    <div class="ticket-converstion-widget-info">
                        <div class="ticket-converstion-widget-info-head">
                            <div class="ticket-converstion-widget-info-date">
                                <span>{{ date('jS M, Y h:i A', strtotime($supportTicketMessage->created_at)) }}</span>
                            </div>
                            <h5>Admin</h5>
                        </div>
                        <div class="ticket-converstion-info-body">
                            <p class="ticket-converstion-info-body-text">
                                {{$supportTicketMessage->message}}
                            </p>

                            @if($supportTicketMessage->attachment)
                            <div class="ticket-converstion-info-body-images admin-images">
                                <div class="ticket-converstion-info-body-single-img">
                                    <a href="{{url(env('ADMIN_URL').'/'.$supportTicketMessage->attachment)}}" data-fancybox="photo" class="image-view-btn">
                                        <img src="{{url(env('ADMIN_URL').'/'.$supportTicketMessage->attachment)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="ticket-converstion-widget-img">
                        {{-- <img alt="#" src="{{url('frontend_assets')}}/assets/images/ticket-conversation-img/admin-profile.svg"> --}}
                    </div>
                </div>
                @else
                <div class="ticket-converstion-widget user-conversation">
                    <div class="ticket-converstion-widget-img">
                        @if($supportTicketMessage->user_image)
                        <img alt="" src="{{url(env('ADMIN_URL').'/'.$supportTicketMessage->user_image)}}">
                        @endif
                    </div>
                    <div class="ticket-converstion-widget-info">
                        <div class="ticket-converstion-widget-info-head">
                            <h5>{{$supportTicketMessage->user_name}}</h5>
                            <div class="ticket-converstion-widget-info-date">
                                <span>{{ date('jS M, Y h:i A', strtotime($supportTicketMessage->created_at)) }}</span>
                            </div>
                        </div>
                        <div class="ticket-converstion-info-body">
                            <p class="ticket-converstion-info-body-text">
                                {{$supportTicketMessage->message}}
                            </p>

                            @if($supportTicketMessage->attachment)
                            <div class="ticket-converstion-info-body-images">
                                <div class="ticket-converstion-info-body-single-img">
                                    <a href="{{url(env('ADMIN_URL').'/'.$supportTicketMessage->attachment)}}" data-fancybox="photo" class="image-view-btn">
                                        <img src="{{url(env('ADMIN_URL').'/'.$supportTicketMessage->attachment)}}" alt="">
                                    </a>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                @endif
                @endforeach


            </div>


            <form action="{{route('send.support.message')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="support_ticket_id" value="{{$supportTicket->id}}">
                <div class="ticket-converstion-bottom">
                    <div class="ticket-converstion-navigation">
                        <textarea type="text" name="message" placeholder="Type your message"></textarea>
                        <div class="ticket-converstion-navigation-tools">
                            <div class="ticket-c-navigation-attachment">
                                <div class="ticket-c-navigation-upload-image">
                                    <input type="file" name="image" id="upload-img" placeholder="Choose file" multiple=""><label for="upload-img"><i class="fi fi-rs-clip"></i></label>
                                </div>
                            </div>
                            <button type="submit" class="ticket-c-navigation-send-btn btn btn-primary" style="height: 40px; width: 40px; line-height: 44px;">
                                <i class="fi-rr-paper-plane" style="font-size: 20px;"></i>
                            </button>
                        </div>
                        <div class="upload-image-list"></div>
                    </div>
                </div>
            </form>

        </div>
        <div></div>
    </div>

</div>


@endsection