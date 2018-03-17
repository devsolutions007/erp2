@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">Grow Setting Room</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="growArea" class="col-form-label">Grow Area</label>
                        <select id="growArea" class="form-control">
                            <option>Choose</option>
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-form-label">Rooms</label>
                        <select id="" class="form-control">
                            <option>Choose</option>
                            <option>1</option>
                            <option>2</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="" class="col-form-label" style="opacity: 0; display: block;">Search</label>
                        <button class="btn btn-block btn-primary" type="submit">Save</button>
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
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Expire Alarm Days</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">Rows</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Columns</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
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
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">OffsetY</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
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
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">H-gap between block</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row gutters">
                                    <label class="col-sm-3 col-form-label">Rows per block</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Rows per block</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
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
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <label class="col-sm-3 col-form-label">Cell width of plant</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>      
                        </div><br>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"></div>
                </div>
            </div>
        </div>
    </div>
</div>                    
@endsection

