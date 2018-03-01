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
                                    <option value="{{$l->id}}" {{($customer->location_id == $l->id ? 'selected' : '')}}>{{$l->name}}</option>
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
                            <input  name="first_name" value="{{$customer->first_name}}">
                        </div>
                    </div>
                </div>

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Last Name
                        </label>
                        <div>
                            <input  name="last_name" value="{{$customer->last_name}}">
                        </div>
                    </div>
                </div>

                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Email
                        </label>
                        <div>
                            <input  name="email" value="{{$customer->email}}">
                        </div>
                    </div>
                </div>
                <div class="content no-padding">
                    <div class="section _100">
                        <label>
                            Cell
                        </label>
                        <div>
                            <input  name="cell" value="{{$customer->cell}}">
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
                                <option value="AL" {{($customer->state_of_residence == 'AL' ? 'selected' : '') }}>Alabama</option>
                                <option value="AK" {{($customer->state_of_residence == 'AK' ? 'selected' : '') }}>Alaska</option>
                                <option value="AZ" {{($customer->state_of_residence == 'AZ' ? 'selected' : '') }}>Arizona</option>
                                <option value="AR" {{($customer->state_of_residence == 'AR' ? 'selected' : '') }}>Arkansas</option>
                                <option value="CA" {{($customer->state_of_residence == 'CA' ? 'selected' : '') }}>California</option>
                                <option value="CO" {{($customer->state_of_residence == 'CO' ? 'selected' : '') }}>Colorado</option>
                                <option value="CT" {{($customer->state_of_residence == 'CT' ? 'selected' : '') }}>Connecticut</option>
                                <option value="DE" {{($customer->state_of_residence == 'DE' ? 'selected' : '') }}>Delaware</option>
                                <option value="DC" {{($customer->state_of_residence == 'DC' ? 'selected' : '') }}>District Of Columbia</option>
                                <option value="FL" {{($customer->state_of_residence == 'FL' ? 'selected' : '') }}>Florida</option>
                                <option value="GA" {{($customer->state_of_residence == 'GA' ? 'selected' : '') }}>Georgia</option>
                                <option value="HI" {{($customer->state_of_residence == 'HI' ? 'selected' : '') }}>Hawaii</option>
                                <option value="ID" {{($customer->state_of_residence == 'ID' ? 'selected' : '') }}>Idaho</option>
                                <option value="IL" {{($customer->state_of_residence == 'IL' ? 'selected' : '') }}>Illinois</option>
                                <option value="IN" {{($customer->state_of_residence == 'IN' ? 'selected' : '') }}>Indiana</option>
                                <option value="IA" {{($customer->state_of_residence == 'IA' ? 'selected' : '') }}>Iowa</option>
                                <option value="KS" {{($customer->state_of_residence == 'KS' ? 'selected' : '') }}>Kansas</option>
                                <option value="KY" {{($customer->state_of_residence == 'KY' ? 'selected' : '') }}>Kentucky</option>
                                <option value="LA" {{($customer->state_of_residence == 'LA' ? 'selected' : '') }}>Louisiana</option>
                                <option value="ME" {{($customer->state_of_residence == 'ME' ? 'selected' : '') }}>Maine</option>
                                <option value="MD" {{($customer->state_of_residence == 'MD' ? 'selected' : '') }}>Maryland</option>
                                <option value="MA" {{($customer->state_of_residence == 'MA' ? 'selected' : '') }}>Massachusetts</option>
                                <option value="MI" {{($customer->state_of_residence == 'MI' ? 'selected' : '') }}>Michigan</option>
                                <option value="MN" {{($customer->state_of_residence == 'MN' ? 'selected' : '') }}>Minnesota</option>
                                <option value="MS" {{($customer->state_of_residence == 'MS' ? 'selected' : '') }}>Mississippi</option>
                                <option value="MO" {{($customer->state_of_residence == 'MO' ? 'selected' : '') }}>Missouri</option>
                                <option value="MT" {{($customer->state_of_residence == 'MT' ? 'selected' : '') }}>Montana</option>
                                <option value="NE" {{($customer->state_of_residence == 'NE' ? 'selected' : '') }}>Nebraska</option>
                                <option value="NV" {{($customer->state_of_residence == 'NV' ? 'selected' : '') }}>Nevada</option>
                                <option value="NH" {{($customer->state_of_residence == 'NH' ? 'selected' : '') }}>New Hampshire</option>
                                <option value="NJ" {{($customer->state_of_residence == 'NJ' ? 'selected' : '') }}>New Jersey</option>
                                <option value="NM" {{($customer->state_of_residence == 'NM' ? 'selected' : '') }}>New Mexico</option>
                                <option value="NY" {{($customer->state_of_residence == 'NY' ? 'selected' : '') }}>New York</option>
                                <option value="NC" {{($customer->state_of_residence == 'NC' ? 'selected' : '') }}>North Carolina</option>
                                <option value="ND" {{($customer->state_of_residence == 'ND' ? 'selected' : '') }}>North Dakota</option>
                                <option value="OH" {{($customer->state_of_residence == 'OH' ? 'selected' : '') }}>Ohio</option>
                                <option value="OK" {{($customer->state_of_residence == 'OK' ? 'selected' : '') }}>Oklahoma</option>
                                <option value="OR" {{($customer->state_of_residence == 'OR' ? 'selected' : '') }}>Oregon</option>
                                <option value="PA" {{($customer->state_of_residence == 'PA' ? 'selected' : '') }}>Pennsylvania</option>
                                <option value="RI" {{($customer->state_of_residence == 'RI' ? 'selected' : '') }}>Rhode Island</option>
                                <option value="SC" {{($customer->state_of_residence == 'SC' ? 'selected' : '') }}>South Carolina</option>
                                <option value="SD" {{($customer->state_of_residence == 'SD' ? 'selected' : '') }}>South Dakota</option>
                                <option value="TN" {{($customer->state_of_residence == 'TN' ? 'selected' : '') }}>Tennessee</option>
                                <option value="TX" {{($customer->state_of_residence == 'TX' ? 'selected' : '') }}>Texas</option>
                                <option value="UT" {{($customer->state_of_residence == 'UT' ? 'selected' : '') }}>Utah</option>
                                <option value="VT" {{($customer->state_of_residence == 'VT' ? 'selected' : '') }}>Vermont</option>
                                <option value="VA" {{($customer->state_of_residence == 'VA' ? 'selected' : '') }}>Virginia</option>
                                <option value="WA" {{($customer->state_of_residence == 'WA' ? 'selected' : '') }}>Washington</option>
                                <option value="WV" {{($customer->state_of_residence == 'WV' ? 'selected' : '') }}>West Virginia</option>
                                <option value="WI" {{($customer->state_of_residence == 'WI' ? 'selected' : '') }}>Wisconsin</option>
                                <option value="WY" {{($customer->state_of_residence == 'WY' ? 'selected' : '') }}>Wyoming</option>
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
                                <option value="Med" {{($customer->type == 'Med' ? 'selected' : '') }}>Medical</option>
                                <option value="Rec" {{($customer->type == 'Rec' ? 'selected' : '') }}>Recreational</option>

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
                                <option value="Admin" {{($customer->acct_source == 'Admin' ? 'selected' : '') }}>Admin</option>
                                <option value="Cell Collect from Widget (Legacy)" {{($customer->acct_source == 'Cell Collect from Widget (Legacy)' ? 'selected' : '') }}>Cell Collect from Widget (Legacy)</option>
                                <option value="Event: Pirate Fest 2017" {{($customer->acct_source == 'Event: Pirate Fest 2017' ? 'selected' : '') }}>Event: Pirate Fest 2017</option>
                                <option value="In-Store Checkin" {{($customer->acct_source == 'In-Store Checkin' ? 'selected' : '') }}>In-Store Checkin</option>
                                <option value="Online Order" {{($customer->acct_source == 'Online Order' ? 'selected' : '') }}>Online Order</option>
                                <option value="Organic Signup" {{($customer->acct_source == 'Organic Signup' ? 'selected' : '') }}>Organic Signup</option>
                                <option value="Product Alert Subscription" {{($customer->acct_source == 'Product Alert Subscription' ? 'selected' : '') }}>Product Alert Subscription</option>
                                <option value="Subscription/Lead Upload" {{($customer->acct_source == 'Subscription/Lead Upload' ? 'selected' : '') }}>Subscription/Lead Upload</option>

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
                                            <input name="{{$pref}}" type="checkbox" value="1"  {{($customer->$pref == 1 ? 'checked' : '')}}/>
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
                                        <input name="sms_optin" type="checkbox" value="1"  {{($customer->sms_optin == 1 ? 'checked' : '')}} />
                                        SMS Opt-in
                                    </label>
                                </p>
                            </div>

                        </div>
                    </div>

                </div>









                <div class="actions">
                    <div class="actions-right">
                        <input type="hidden" name="customer_id" value="{{$customer->id}}" />
                        {{ csrf_field() }}
                        <input type="submit" />
                    </div>
                </div>

            </form>
        </div> <!-- End of .box -->
    </div> <!-- End of .grid_6 -->
    <div class="clear"></div>
@endsection