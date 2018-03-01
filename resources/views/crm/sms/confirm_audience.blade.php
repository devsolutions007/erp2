@extends('layouts.master')

@section('content')

    <div class="grid_4">
        <div class="box">

        </div>
    </div>
    <div class="grid_4">
        <div class="box">
            <div class="header">
                <h3>Confirm Audience</h3>
            </div>
            <form class="validate" action="/sms/step-3" method="post">
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
                            SMS Message
                        </label>
                        <div>
                                <textarea cols="40" rows="5" class="required" name="sms_message" id="sms_message" required></textarea>
                        </div>
                    </div>

                </div>

                <div class="actions">
                    <div class="actions-right">
                        {{ csrf_field() }}
                        <input type="submit" value="continue" />
                    </div>
                </div>

            </form>
        </div>
    </div>


@endsection