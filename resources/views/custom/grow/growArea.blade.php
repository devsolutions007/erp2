@extends('layouts.app')

@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card top-blue-bdr">
                <div class="card-header">Grow Area
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addGrowAreaModal">Add New</button>
                </div>
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
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Register Date</th>
                                        <th>Administrator</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $growAreas as $key => $growArea )
                                       <tr id="growAreaRow{{$growArea->id}}">
                                            <th scope="row">#</th>
                                            <th id='growName{{$key}}'>{{ $growArea->name }}</th>
                                            <td>{{ $growArea->reg_date }}</td>
                                            <td>{{ $growArea->owner }} </td>
                                            <td><?php 
                                                    $type = 'Grow';
                                                    if($growArea->type =="2")  $type =  "Clone";
                                                    if($growArea->type =="3")  $type =  "Vegetation";
                                                    if($growArea->type =="4")  $type =  "Flower";
                                                    if($growArea->type =="5")  $type =  "Harvest-drying";
                                                    if($growArea->type =="6")  $type =  "Harvest-curing";
                                                    if($growArea->type =="7")  $type =  "Cutweigh-wet"; ?> {{ $type }}</td>
                                                    <td><button class="btn btn-sm btn-primary" onclick='showEditGrowModal("{{$growArea->name}}", "{{$growArea->type}}", "{{$growArea->licence_num}}", "{{$growArea->id}}")'>Edit</button>

                                                        <button class="btn btn-sm btn-warning removeGrowArea" onclick='removeGrowArea( "{{$growArea->id}}", "{{$growArea->name}}" )'>Remove</button></td>
                                        </tr>
                                        <?php $count= 1;?>
                                        @foreach( $growRooms as $growRoom )
                                        <?php if($growRoom->parent_id == $growArea->id) { ?>
                                        <tr id="growAreaRow{{$growRoom->id}}">
                                            <th scope="row">{{ $count }}</th>
                                            <td>{{ $growRoom->name }}</td>
                                            <td>{{ $growRoom->reg_date }}</td>
                                            <td>{{ $growRoom->owner }}</td>
                                            <td><?php 
                                                    $type = 'Grow';
                                                    if($growRoom->type =="2")  $type =  "Clone";
                                                    if($growRoom->type =="3")  $type =  "Vegetation";
                                                    if($growRoom->type =="4")  $type =  "Flower";
                                                    if($growRoom->type =="5")  $type =  "Harvest-drying";
                                                    if($growRoom->type =="6")  $type =  "Harvest-curing";
                                                    if($growRoom->type =="7")  $type =  "Cutweigh-wet"; ?> {{ $type }}</td>
                                            <td><button class="btn btn-sm btn-primary" onclick='showEditGrowModal("{{$growRoom->name}}", "{{$growRoom->type}}", "{{$growRoom->licence_num}}", "{{$growRoom->id}}")'>Edit</button>

                                                <button class="btn btn-sm btn-warning removeGrowArea" onclick='removeGrowArea( "{{$growRoom->id}}", "{{$growRoom->name}}" )'>Remove</button></td>
                                        </tr> 
                                        <?php $count++; } ?>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
    <!-- add grow area Modal start-->
    <div class="modal fade" id="addGrowAreaModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="addGrowAreaModalLabel">Add Grow Area</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="POST" action="/grow/growAreaAdd?growMenu=visible">
                        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label for="addGrowAreaDate" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Enter Name" name="name" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addGrowAreaGrowArea" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <input type="text" name="type" value="Grow" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addGrowAreaProduct" class="col-sm-3 col-form-label">Licence Number</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="Enter Licence" name="licence_number" type="text">
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
    <!-- add grow area modal end -->

    <!-- Edit grow area Modal start-->
    <div class="modal fade" id="editGrowAreaModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="editGrowAreaModalLabel">Edit Grow Area</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="POST" action="/grow/growAreaEdit?growMenu=visible">
                        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label for="editName" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input id="editName" class="form-control" placeholder="Enter Name" name="name" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addGrowAreaGrowArea" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    
                                    <select id="editType" name="type" class="form-control">
                                        <option value='1'>Grow</option>
                                        <option value='2'>Clone</option>
                                        <option value='3'>Vegetation</option>
                                        <option value='4'>Flower</option>
                                        <option value='7'>Cutweigh-wet</option>
                                        <option value='5'>Harvest-drying</option>
                                        <option value='6'>Harvest-curing</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="editLicenceNumber" class="col-sm-3 col-form-label">Licence Number</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="editLicenceNumber" placeholder="Enter Licence" name="licence_number" type="text">
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="editGrowAreaId" id="editGrowAreaId">
                            <button type="submit" class="btn btn-primary" id="saveGrowAreaChanges">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
    <!-- Edit grow area modal end -->

@endsection

