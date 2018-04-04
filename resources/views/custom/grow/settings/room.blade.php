@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">Grow Setting Room</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="area_select" class="col-form-label">Grow Area</label>
                        <select id="area_select" class="form-control">
                            @foreach( $growAreas as $growArea )
                            <option value="{{ $growArea->id }}">{{ $growArea->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="left_room_select" class="col-form-label">Rooms</label>
                        <select id="left_room_select" class="form-control">
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-form-label" style="opacity: 0; display: block;">Search</label>
                        <button class="btn btn-block btn-primary" id="save_setting" type="button">Save</button>
                    </div>
                    <div class="col-md-6"></div>
                </div><br>            
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">General Setting</div>
                            <div class="card-body">

                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">Growing days</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_grow_day" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Expire Alarm Days</label>
                                    <div class="col-sm-2">
                                        <input id="room_alarm_days" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">Rows</label>
                                    <div class="col-sm-2">
                                        <input id="room_rows" name="room_rows" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Columns</label>
                                    <div class="col-sm-2">
                                        <input id="room_cols" name="room_cols" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>      
                        </div><br>
                        <div class="card">
                            <div class="card-header">GUI Configuration</div>
                            <div class="card-body">

                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">OffsetX</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_offsetX" name="room_offsetX" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">OffsetY</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_offsetY" name="room_offsetY" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>      
                        </div><br>
                        <div class="card">
                            <div class="card-header">Block Configuration</div>
                            <div class="card-body">

                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">Columns per block</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_cols_per" name="room_cols_per" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">H-gap between block</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_hgap" name="room_hgap" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">Rows per block</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_rows_per" name="room_rows_per" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Rows per block</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_wgap" name="room_wgap" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>      
                        </div><br>
                        <div class="card">
                            <div class="card-header">Cell Configuration</div>
                            <div class="card-body">

                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">Cell height of plant</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_cell_height" name="room_cell_height" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Cell width of plant</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="room_cell_width" name="room_cell_width" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>      
                        </div><br>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="fichetwothirdright">
                            <div class="ficheaddleft" style="height: 750px;">
                                <div id='preview_room_settings' class="dragscroll dragscroll_view room_preview_setting" >
                                    <svg version="1.1"
                                        baseProfile="full"
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        xmlns:ev="http://www.w3.org/2001/xml-events" id='left_room' width=50000 height=50000 >
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

@endsection

