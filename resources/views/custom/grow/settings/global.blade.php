@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">GUI Configuration</div>
                <div class="card-body">
                    <form>
                        <div class="form-group row gutters">
                            <label class="col-sm-3 col-form-label">Clone Color</label>
                            <div class="col-sm-2">
                                <input type="color" class="form-control" value="#DD0F20"/>
                            </div>
                            <div class="col-md-2"></div>
                            <label class="col-sm-3 col-form-label">Vegitation Color</label>
                            <div class="col-sm-2">
                                <input type="color" class="form-control" value="#DD0F20"/>
                            </div>
                        </div>
                        <div class="form-group row gutters">
                            <label class="col-sm-3 col-form-label">Flower Color</label>
                            <div class="col-sm-2">
                                <input type="color" class="form-control" value="#DD0F20"/>
                            </div>
                            <div class="col-md-2"></div>
                            <label class="col-sm-3 col-form-label">Cutweigh Wet Color</label>
                            <div class="col-sm-2">
                                <input type="color" class="form-control" value="#DD0F20"/>
                            </div>
                        </div>
                        <div class="form-group row gutters">
                            <label class="col-sm-3 col-form-label">Harvest Drying Color</label>
                            <div class="col-sm-2">
                                <input type="color" class="form-control" value="#DD0F20"/>
                            </div>
                            <div class="col-md-2"></div>
                            <label class="col-sm-3 col-form-label">Harvest Curing</label>
                            <div class="col-sm-2">
                                <input type="color" class="form-control" value="#DD0F20"/>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </form>            
            </div>
        </div>
    </div>
</div>

@endsection

