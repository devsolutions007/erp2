@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <form class="form-horizontal" method="POST" action="/warehouse/store">
            <input type="hidden"
                   name="_token"
                   value="{{ csrf_token() }}">
                <div class="card-header">Create Warehouse</div> 
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
                
                    <div class="form-group row gutters">
                        <label class="col-sm-1 col-form-label">Ref.</label>
                        <div class="col-sm-5">
                            <input type="text" name="ref" class="form-control" value="{{old('ref')}}"/>
                            @if($errors->has('ref')) 
                                <p class="help-block">{{$errors->first('ref')}}</p>
                            @endif
                        </div>
                        <label class="col-sm-2 col-form-label">Short name location</label>
                        <div class="col-sm-4">
                            <input type="text" name="short_location_name" class="form-control" value="{{old('short_location_name')}}" required/>
                            @if($errors->has('short_location_name')) 
                                <p class="help-block">{{$errors->first('short_location_name')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row gutters">
                        <label class="col-sm-1 col-form-label">Add In</label>
                        <div class="col-sm-5">
                            <select id="add_in" class="form-control show-tick" name="add_in">
                                @if($warehouseList)
                                    @foreach($warehouseList as $warehouse)
                                        <option value="{{$warehouse->id}}">{{$warehouse->label}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->has('add_in')) 
                                <p class="help-block">{{$errors->first('add_in')}}</p>
                            @endif
                        </div>
                        <label class="col-sm-1 col-form-label">Description</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="description">{{old('description')}}</textarea>
                            @if($errors->has('description')) 
                                <p class="help-block">{{$errors->first('description')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row gutters">
                        <label class="col-sm-1 col-form-label">Address</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" name="address">{{old('address')}}</textarea>
                            @if($errors->has('address')) 
                                <p class="help-block">{{$errors->first('address')}}</p>
                            @endif
                        </div>
                        <label class="col-sm-1 col-form-label">Zip</label>
                        <div class="col-sm-5">
                            <input type="text" name="zip" class="form-control" value="{{old('zip')}}"/>
                            @if($errors->has('zip')) 
                                <p class="help-block">{{$errors->first('zip')}}</p>
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
                        <label class="col-sm-1 col-form-label">Country</label>
                        <div class="col-sm-5">
                            <select class="form-control show-tick" name="country_id">
                                @if($countries)
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->label}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if($errors->has('country')) 
                                <p class="help-block">{{$errors->first('country')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row gutters">
                        <label class="col-sm-1 col-form-label">Status</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="status">
                                <option value="1">Open</option>
                                <option value="0">Close</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                </div>
            </form>
        </div>  
    </div>
</div>

@endsection

