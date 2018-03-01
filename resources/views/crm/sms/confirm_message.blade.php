@extends('layouts.master')

@section('content')

    <div class="grid_4">
        <div class="box">

        </div>
    </div>
    <div class="grid_4">
        <div class="box">
            <div class="header">
                <h3>Confirm Message and Send</h3>
            </div>
            <form class="validate" action="#" method="post">
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Locations
                        </label>
                        <div>
                            @foreach($locations as $l)
                                <p>
                                    {{$l->name}}
                                </p>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Filters
                        </label>
                        <div>
                            <p>
                                {{$selectedPreferencesString}}
                            </p>
                        </div>
                    </div>

                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Filter Type
                        </label>
                        <div>
                            <p>
                               Matches <b>{{($whereFilter == 'where' ? 'ALL' : 'ANY')}}</b>
                            </p>
                        </div>
                    </div>

                </div>

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Total Customers
                        </label>
                        <div>
                            <p>
                                {{$customerCount}}
                            </p>
                        </div>
                    </div>

                </div>

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Message Details
                        </label>
                        <div>
                            <p>Characters:  {{$message_length}}</p>
                            <p>Segments:  {{$message_segments}}</p>
                            <p>Total Credits: <b>{{$message_segments * $customerCount}}</b></p>

                        </div>
                    </div>

                </div>

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            SMS Message
                        </label>
                        <div>
                            <p>
                                {{$sms_message}}
                            </p>

                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>

    <div class="clear"></div>


    <div class="grid_4"><div class="box"></div></div>
    <div class="grid_4">
        <div class="box">
            <div class="header">
                <h3>Send Test Message</h3>
            </div>
            <form class="validate" action="/sms/test" method="post">
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Cell Number
                        </label>
                        <div>
                            <input class="required" name="test_number" id="test_number">
                        </div>
                    </div>

                </div>
                <div class="actions">
                    <div class="actions-right">
                        {{ csrf_field() }}
                        <input type="submit" value="Send Test" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="clear"></div>

    <div class="grid_4"><div class="box"></div></div>
    <div class="grid_4">
        <div class="box">
            <div class="header">
                <h3>Send Messsage</h3>
            </div>
            <form class="validate" action="/sms/schedule" method="post" onsubmit="return confirm('Do you really want to send this message?');">
                <div class="content">

                        <p>Your message will be sent to <b style="color:maroon">{{$customerCount}}</b> customers and will
                        use <b style="color:maroon">{{$customerCount * $message_segments}}</b> credits. If you're sure you are ready to
                            send your message, please click <i>Send Message</i> below.</p>


                </div>
                <div class="actions">
                    <div class="actions-right">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$customerCount * $message_segments}}" name="quoted_credits" />
                        <input type="submit" value="Send Message" confirm />
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection