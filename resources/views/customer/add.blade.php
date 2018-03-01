@extends('layouts.master')

@section('content')
    <div class="grid_4">
        <div class="box">

        </div>
    </div>
    <div class="grid_4">
        <div class="box">
            <div class="header">
                <img src="/img/icons/16x16/user.png" alt="" width="16"
                     height="16">
                <h3>Add User</h3>

            </div>
            <form class="validate" action="/customers/save" method="post">
                    <div class="content no-padding">
                        <div class="section _100">
                            <label>
                                Location
                            </label>
                            <div>
                                <select name="location_id">
                                    <option value="0">-- Please Choose a Location --</option>
                                    @foreach($locations as $l)
                                        <option value="{{$l->id}}">{{$l->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="content no-padding">
                        <div class="section _100">
                            <label>
                                First Name
                            </label>
                            <div>
                                <input  name="first_name" value="">
                            </div>
                        </div>
                    </div>

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Last Name
                        </label>
                        <div>
                            <input  name="last_name" value="">
                        </div>
                    </div>
                </div>

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Email
                        </label>
                        <div>
                            <input  name="email" value="">
                        </div>
                    </div>
                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Cell
                        </label>
                        <div>
                            <input  name="cell" value="">
                        </div>
                    </div>
                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            State
                        </label>
                        <div>
                            <select name="state_of_residence">
                                <option value="0">-- Please Choose a State  --</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Type
                        </label>
                        <div>
                            <select name="type">
                                <option value="0">-- Please Choose a Type --</option>
                                <option value="Med">Medical</option>
                                <option value="Rec">Recreational</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Source
                        </label>
                        <div>
                            <select name="acct_source">
                                <option value="0">-- Please Choose a Source --</option>
                                <option value="Admin">Admin</option>
                                <option value="Cell Collect from Widget (Legacy)">Cell Collect from Widget (Legacy)</option>
                                <option value="Event: Pirate Fest 2017">Event: Pirate Fest 2017</option>
                                <option value="In-Store Checkin">In-Store Checkin</option>
                                <option value="Online Order">Online Order</option>
                                <option value="Organic Signup">Organic Signup</option>
                                <option value="Product Alert Subscription">Product Alert Subscription</option>
                                <option value="Subscription/Lead Upload">Subscription/Lead Upload</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Preferences
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
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            SMS Optin
                        </label>
                        <div class="_100">



                                <div class="_50">
                                    <p>
                                        <label for="sms_optin">
                                            <input name="sms_optin" type="checkbox" value="1"  checked />
                                            SMS Opt-in
                                        </label>
                                    </p>
                                </div>

                        </div>
                    </div>

                </div>











                <div class="actions">
                    <div class="actions-right">
                        {{ csrf_field() }}
                        <input type="submit" />
                    </div>
                </div>

            </form>
        </div> <!-- End of .box -->
    </div> <!-- End of .grid_6 -->
    <div class="clear"></div>
@endsection