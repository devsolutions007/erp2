@extends('layouts.app')

@section('content')
<style type="text/css">
    .was-validated {
        display: inline-block;
    }
</style>
<?php
$carriers = array('carrier1', 'carrier2', 'carrier3');
$referrals = array('referral1', 'referral2', 'referral3');
$members = array('member1', 'member2', 'member3');
$locations = array('location1', 'location2', 'location3');
$limit_units = array('unit1', 'unit2', 'unit3');
$care_givers = array('Care Giver 1', 'Care Giver 2', 'Care Giver 3');
$doctors = array('doctor1', 'doctor2', 'doctor3');
?>
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">Create Customer</div> 
            <div class="card-body">
                @if(Session::has('message'))
                <div class="gutters row">
                    <div class="col-md-12 session-message">
                        <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}<button type="button" class="close-session-message close pull-right" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></p>
                    </div> 
                </div>   
                @endif
            
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="moreInfo-tab" data-toggle="tab" href="#moreInfo" role="tab" aria-controls="moreInfo" aria-selected="true">More Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="marketing-tab" data-toggle="tab" href="#marketing" role="tab" aria-controls="marketing" aria-selected="false">Marketing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tab" data-toggle="tab" href="#custom" role="tab" aria-controls="custom" aria-selected="false">Custom</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                        <form class="form-horizontal" method="POST" action="/customers/saveCustomerDetails">
                            <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Last Name</label>
                                <div class="col-sm-5">
                                    <input type="text" name="last_name" class="form-control" value="{{old('last_name')}}"/>
                                    @if($errors->has('last_name')) 
                                        <p class="help-block">{{$errors->first('last_name')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">First Name</label>
                                <div class="col-sm-5">
                                    <input type="text" name="first_name" class="form-control" value="{{old('first_name')}}" required/>
                                    @if($errors->has('first_name')) 
                                        <p class="help-block">{{$errors->first('first_name')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Middle Name</label>
                                <div class="col-sm-5">
                                    <input type="text" name="middle_name" class="form-control" value="{{old('middle_name')}}"/>
                                    @if($errors->has('middle_name')) 
                                        <p class="help-block">{{$errors->first('middle_name')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Phone No.</label>
                                <div class="col-sm-5">
                                    <input type="text" name="phone" class="form-control" value="{{old('phone')}}" onkeyup="checkPhoneExist(this)" required/>
                                    @if($errors->has('phone')) 
                                        <p class="help-block">{{$errors->first('phone')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Birth Date</label>
                                <div class="col-sm-5">
                                    <input type="date" name="birth_date" class="form-control" value="{{old('birth_date')}}" required/>
                                    @if($errors->has('birth_date')) 
                                        <p class="help-block">{{$errors->first('birth_date')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="text" name="email" class="form-control" value="{{old('email')}}" onkeyup="checkEmailExist(this)" required/>
                                    @if($errors->has('email')) 
                                        <p class="help-block">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Cell</label>
                                <div class="col-sm-5">
                                    <input type="text" name="cell" class="form-control" value="{{old('cell')}}" required/>
                                    @if($errors->has('cell')) 
                                        <p class="help-block">{{$errors->first('cell')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Carrier</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="carrier" required>
                                        @foreach( $carriers as $car_key =>  $carrier )
                                        <option value="{{ $car_key+1 }}">{{ $carrier }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('carrier')) 
                                        <p class="help-block">{{$errors->first('carrier')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">MMJ Card</label>
                                <div class="col-sm-5">
                                    <input type="text" name="mmj_card" class="form-control" value="{{old('mmj_card')}}" required/>
                                    @if($errors->has('mmj_card')) 
                                        <p class="help-block">{{$errors->first('mmj_card')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Exp</label>
                                <div class="col-sm-5">
                                    <input type="date" name="mmj_exp" class="form-control" value="{{old('mmj_exp')}}" required/>
                                    @if($errors->has('mmj_exp')) 
                                        <p class="help-block">{{$errors->first('mmj_exp')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">DL #</label>
                                <div class="col-sm-5">
                                    <input type="text" name="DL" class="form-control" value="{{old('DL')}}" required/>
                                    @if($errors->has('DL')) 
                                        <p class="help-block">{{$errors->first('DL')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Exp</label>
                                <div class="col-sm-5">
                                    <input type="date" name="dl_exp" class="form-control" value="{{old('dl_exp')}}" required/>
                                    @if($errors->has('dl_exp')) 
                                        <p class="help-block">{{$errors->first('dl_exp')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Referral</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="referral">
                                        @foreach( $referrals as $ref_key =>  $referral )
                                        <option value="{{ $ref_key+1 }}">{{ $referral }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label">Member</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="member">
                                        @foreach( $members as $mem_key =>  $member )
                                        <option value="{{ $mem_key+1 }}">{{ $member }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Discount</label>
                                <div class="col-sm-5">
                                    <input type="text" name="discount" class="form-control" value="{{old('discount')}}"/>
                                    @if($errors->has('discount')) 
                                        <p class="help-block">{{$errors->first('discount')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Since</label>
                                <div class="col-sm-5">
                                    <input type="date" name="since" class="form-control" value="{{old('since')}}" required/>
                                    @if($errors->has('since')) 
                                        <p class="help-block">{{$errors->first('since')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="action" value="basicInfo">
                                @if(Session::has('message'))
                                <button type="submit" class="btn btn-primary" disabled>Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @else
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="moreInfo" role="tabpanel" aria-labelledby="moreInfo-tab">
                        <form class="form-horizontal" method="POST" action="/customers/saveCustomerDetails">
                            <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Address</label>
                                <div class="col-sm-5">
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}"/>
                                    @if($errors->has('address')) 
                                        <p class="help-block">{{$errors->first('address')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Apt/Suite</label>
                                <div class="col-sm-5">
                                    <input type="text" name="apt_suite" class="form-control" value="{{old('apt_suite')}}"/>
                                    @if($errors->has('apt_suite')) 
                                        <p class="help-block">{{$errors->first('apt_suite')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">City</label>
                                <div class="col-sm-5">
                                    <input type="text" name="city" class="form-control" value="{{old('city')}}"/>
                                    @if($errors->has('city')) 
                                        <p class="help-block">{{$errors->first('city')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">State</label>
                                <div class="col-sm-5">
                                    <input type="text" name="state" class="form-control" value="{{old('state')}}"/>
                                     @if($errors->has('state')) 
                                        <p class="help-block">{{$errors->first('state')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Zip</label>
                                <div class="col-sm-5">
                                    <input type="text" name="zip" class="form-control" value="{{old('zip')}}"/>
                                    @if($errors->has('zip')) 
                                        <p class="help-block">{{$errors->first('zip')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label">Sex</label>
                                <div class="col-md-5 col-form-label">
                                    <label class="custom-control custom-radio">
                                        <input id="radio1" name="sex" value="1" class="custom-control-input" checked="" type="radio">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Male</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio2" name="sex" value="0" class="custom-control-input" type="radio">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Female</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Plants</label>
                                <div class="col-sm-5">
                                    <input type="text" name="plants" class="form-control" value="{{old('plants')}}"/>
                                    @if($errors->has('plants')) 
                                        <p class="help-block">{{$errors->first('plants')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-1 col-form-label" style="opacity: 0;">Checkbox</label>
                                <div class="col-sm-5">
                                    <div class="was-validated">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" name="tax_exempt" class="custom-control-input" value="0" id="tax_exempt" onclick="checkboxClick(this)">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Tax Exempt</span>
                                        </label>
                                    </div>
                                    <div class="was-validated">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" id="is_a_vendor" name="is_a_vendor" class="custom-control-input" value="0" onclick="checkboxClick(this)">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Is a Vendor</span>
                                        </label>
                                    </div>
                                    <div class="was-validated">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" id="is_a_care_giver" name="is_a_care_giver" class="custom-control-input" value="0" onclick="checkboxClick(this)">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Is a Care Giver</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Location</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="location">
                                        @foreach( $locations as $loc_key =>  $location )
                                        <option value="{{ $loc_key+1 }}">{{ $location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label">Limit</label>
                                <div class="col-sm-1">
                                    <input type="text" name="limit" class="form-control" value="{{old('plants')}}"/>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control" name="limit_unit">
                                        @foreach( $limit_units as $lim_unit_key =>  $limit_unit )
                                        <option value="{{ $lim_unit_key+1 }}">{{ $limit_unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-1 col-form-label">Care Giver</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="care_giver">
                                        @foreach( $care_givers as $car_giv_key =>  $care_giver )
                                        <option value="{{ $car_giv_key+1 }}">{{ $care_giver }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label class="col-sm-1 col-form-label">Doctor</label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="doctor">
                                        @foreach( $doctors as $doc_key =>  $doctor )
                                        <option value="{{ $doc_key+1 }}">{{ $doctor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="action" value="moreInfo">
                                @if(Session::has('message'))
                                <input type="hidden" name="id" value="{{ Session::get('id') }}">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @else
                                <button type="submit" class="btn btn-primary" disabled>Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="marketing" role="tabpanel" aria-labelledby="marketing-tab">
                        <form class="form-horizontal" method="POST" action="/customers/saveCustomerDetails">
                            <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                            <div class="form-group row gutters">
                                <label class="col-sm-2 col-form-label">No of Visits</label>
                                <div class="col-sm-4">
                                    <input type="text" name="no_of_visits" class="form-control" value="{{old('no_of_visits')}}"/>
                                    @if($errors->has('no_of_visits')) 
                                        <p class="help-block">{{$errors->first('no_of_visits')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-2 col-form-label">Spent On Date</label>
                                <div class="col-sm-4">
                                    <input type="text" name="spent_on_date" class="form-control" value="{{old('spent_on_date')}}"/>
                                    @if($errors->has('spent_on_date')) 
                                        <p class="help-block">{{$errors->first('spent_on_date')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-2 col-form-label">Points Remaining</label>
                                <div class="col-sm-4">
                                    <input type="text" name="points_remaining" class="form-control" value="{{old('points_remaining')}}"/>
                                    @if($errors->has('points_remaining')) 
                                        <p class="help-block">{{$errors->first('points_remaining')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-2 col-form-label">Customer Referral</label>
                                <div class="col-sm-4">
                                    <input type="text" name="customer_referral" class="form-control" value="{{old('customer_referral')}}"/>
                                    @if($errors->has('customer_referral')) 
                                        <p class="help-block">{{$errors->first('customer_referral')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <div class="col-md-12">
                                    <div class="was-validated">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" id="email_opt_in" name="email_opt_in" class="custom-control-input" value="0" onclick="checkboxClick(this)">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Email Opt-In</span>
                                        </label>
                                    </div>
                                    <div class="was-validated">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" id="text_messaging_opt_in" name="text_messaging_opt_in" class="custom-control-input" value="0" onclick="checkboxClick(this)">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Text Messaging Opt-In</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-info">Create Loyalty Card</a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="action" value="marketing">
                                @if(Session::has('message'))
                                <input type="hidden" name="id" value="{{ Session::get('id') }}">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @else
                                <button type="submit" class="btn btn-primary" disabled>Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @endif
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="custom" role="tabpanel" aria-labelledby="custom-tab">
                        <form class="form-horizontal" method="POST" action="/customers/saveCustomerDetails">
                            <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                            <div class="form-group row gutters">
                                <label class="col-sm-2 col-form-label">Details Came From</label>
                                <div class="col-sm-4">
                                    <input type="text" name="details_came_from" class="form-control" value="{{old('details_came_from')}}"/>
                                    @if($errors->has('details_came_from')) 
                                        <p class="help-block">{{$errors->first('details_came_from')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-2 col-form-label">Male/Femal</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="details_came_from_male_female">
                                        <option value="0">Female</option>
                                        <option value="1">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-2 col-form-label">Audited</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="audited">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 col-form-label">Got Birthday 1/8 ?</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="got_birth_1_8">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-2 col-form-label">Num Member Referrals</label>
                                <div class="col-sm-4">
                                    <input type="text" name="no_member_referrals" class="form-control" value="{{old('no_member_referrals')}}"/>
                                    @if($errors->has('no_member_referrals')) 
                                        <p class="help-block">{{$errors->first('no_member_referrals')}}</p>
                                    @endif
                                </div>
                                <label class="col-sm-2 col-form-label">Referred By</label>
                                <div class="col-sm-4">
                                    <input type="text" name="referred_by" class="form-control" value="{{old('referred_by')}}"/>
                                    @if($errors->has('referred_by')) 
                                        <p class="help-block">{{$errors->first('referred_by')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-2 col-form-label">Member Referrals</label>
                                <div class="col-sm-4">
                                    <input type="text" name="member_referrals" class="form-control" value="{{old('member_referrals')}}"/>
                                    @if($errors->has('member_referrals')) 
                                        <p class="help-block">{{$errors->first('member_referrals')}}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="action" value="custom">
                                @if(Session::has('message'))
                                <input type="hidden" name="id" value="{{ Session::get('id') }}">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @else
                                <button type="submit" class="btn btn-primary" disabled>Save</button>
                                <button type="reset" class="btn btn-secondary">Clear</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
             
        </div>
    </div>
</div>
@endsection

