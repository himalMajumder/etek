@extends('frontend.user_master')
@section('content')
<div class="col-lg-12 col-xl-9 col-12">
    <div class="dashboard-support-ticket mgTop24">
        <div class="dashboard-head-widget style-2" style="margin-bottom: 16px">
            <h5 class="dashboard-head-widget-title">Support tickets</h5>
            <div class="dashboard-head-widget-btn">
                <a class="theme-btn secondary-btn icon-right" href="{{route('create.ticket')}}"><i class="fi-rr-plus"></i>Create ticket</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="support-ticket-table-data table">
                <tbody>
                    @if(count($supportTickets) > 0)
                    @foreach ($supportTickets as $supportTicket)
                    <tr>
                        <td>
                            <span class="support-ticket-number">
                                <img alt="" src="{{asset('user/assets/img/icons/messages.svg')}}">
                                {{ $supportTicket->ticket_no }}
                            </span>
                        </td>
                        <td>
                            <span class="support-ticket-date">{{ date('jS M, Y h:i A', strtotime($supportTicket->created_at)) }}</span>
                        </td>
                        <td>
                            <span class="support-ticket-text">{{ substr($supportTicket->subject, 0, 60) }}...</span>
                        </td>
                        <td>
                            @if ($supportTicket->status == 0)
                            <span class="support-ticket-status-btn" style="background: #0074e4">Pending</span>
                            @elseif($supportTicket->status == 1)
                            <span class="support-ticket-status-btn cancelled">In Progress</span>
                            @elseif($supportTicket->status == 2)
                            <span class="support-ticket-status-btn open">Solved</span>
                            @elseif($supportTicket->status == 3)
                            <span class="support-ticket-status-btn closed">Rejected</span>
                            @else
                            <span class="support-ticket-status-btn hold">On Hold</span>
                            @endif

                        </td>


                        <td>

                            <a class="open-ticket-btn" href="{{route('ticket.conversation', $supportTicket->slug)}}">Open ticket</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">
                            No Support Ticket Found
                        </td>
                    </tr>
                    @endif



            </table>
        </div>
    </div>
</div>
@endsection