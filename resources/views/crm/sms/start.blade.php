@extends('layouts.master')

@section('content')

    <div class="grid_3">
        <div class="box">

        </div>
    </div>
    <div class="grid_6">
        <div class="box">
            <div class="header">
                <h3>Select Audience</h3>
            </div>
            <form class="validate" action="/sms/step-2" method="post">
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Locations
                        </label>
                        <div>
                            @foreach($locations as $l)


                                    <p>
                                        <label for="{{$l->id}}">
                                            <input name="locations[]" type="checkbox" value="{{$l->id}}"  required />
                                            {{$l->name}} ({{$l->total}} Customers)
                                        </label>
                                    </p>

                            @endforeach

                        </div>
                    </div>

                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Preferences
                            <p><small>(Blank for All)</small></p>
                        </label>
                        <div class="_100">

                            @foreach($preferences as $pref)

                                <div class="_50">
                                    <p>
                                        <label for="{{$pref}}">
                                            <input name="{{$pref}}" type="checkbox" value="1"  />
                                            {{ucwords(str_replace('-',' ',str_replace('pref_','',$pref)))}}
                                        </label>
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>


                <form class="validate" action="/sms/step-2" method="post">
                    <div class="content no-padding">
                        <div class="section _100">
                            <label>
                                Match Type
                            </label>
                            <div class="_50">
                                <p>
                                    <label>
                                        <input name="match_type" type="radio" class="required"  value="orWhere" checked/>
                                        Customers match <b>ANY</b> of the filters
                                    </label>
                                    <label>
                                        <input name="match_type" type="radio" class="required" value="where"/>
                                        Customers match <b>ALL</b> of the filters
                                    </label>
                                </p>
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