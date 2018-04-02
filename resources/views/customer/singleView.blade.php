@extends('layouts.app')

@section('content')
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
            <div class="card-header">Customer Details</div> 
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
                <div id="accordion" role="tablist">
                    <div class="card mb-0">
                        <div class="card-header" role="tab" id="headingOne">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Basic Info
                                </a>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Name: {{ $customerDetail->first_name }} {{ $customerDetail->middle_name }} {{ $customerDetail->last_name}}</p>
                                        <p>Phone: {{ $customerDetail->phone }}</p>
                                        <p>Phone: {{ $customerDetail->email }}</p>
                                        <p>Birthday: {{ $customerDetail->birthday }}</p>
                                        <p>Cell: {{ $customerDetail->cell }}</p>
                                        <p>Carrier: @foreach( $carriers as $car_key =>  $carrier )
                                                        @if($customerDetail->carrier == $car_key+1)
                                                            {{$carrier}}
                                                        @endif
                                                    @endforeach</p>
                                        <p>MMJ Card: {{ $customerDetail->mmj_card }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>MMJ Expiry: {{ $customerDetail->mmj_exp }}</p>
                                        <p>DL # {{ $customerDetail->DL }}</p>
                                        <p>DL Expiry: {{ $customerDetail->dl_exp }}</p>
                                        <p>Referral: @foreach( $referrals as $ref_key =>  $referral )
                                                    @if($customerDetail->referral == $ref_key+1)
                                                    {{ $referral }}
                                                    @endif
                                                @endforeach</p>
                                        <p>Member: @foreach( $members as $mem_key =>  $member )
                                                    @if($customerDetail->member == $mem_key+1)
                                                    {{$member}}
                                                    @endif
                                                @endforeach</p>
                                        <p>Discount: {{ $customerDetail->discount }} % </p>
                                        <p>Since: {{ $customerDetail->since }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" role="tab" id="headingTwo">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    More Info
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Address: {{ $customerDetail->address }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Apt/Suite: {{ $customerDetail->apt_suite }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" role="tab" id="headingThree">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Marketing
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" role="tab" id="headingFour">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Custom
                                </a>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
             
        </div>
    </div>
</div>
@endsection

