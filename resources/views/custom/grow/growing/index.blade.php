@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                Grow List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addNewGrowModal">New Grow</button>  
                @endif 
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'move')
                Move Grow List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addMoveGrowModal">Move Grow</button> 
                @endif 
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'release')
                Release Grow List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addReleaseGrowModal">Release Grow</button>  
                @endif              
            </div>
            <div class="card-body">
                <div class="row">
                    @if(Session::has('message'))
                    <div class="col-md-12 session-message">
                        <p class="alert {{ Session::get('alert-class') }}">{{ Session::get('message') }}<button type="button" class="close-session-message close pull-right" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></p>
                    </div>    
                    @endif
                    @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                    <div class="col-md-12">
                        <table class="table table-striped m-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Metric ID</th>
                                <th>Parent Metric ID</th>
                                <th>Grow House</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_lists as $key => $product_list)
                            <tr id="growingRow{{$key}}">
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$product_list->label}}</td>
                                <td>{{$product_list->rfid}}</td>
                                <td>{{$product_list->parent_rfid}}</td>
                                <td></td>
                                <td><button class="btn btn-sm btn-warning removeGrowing" onclick='removeGrowing( "{{$product_list->rfid}}", "{{$product_list->label}}", "{{$key}}" )'>Remove</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    @endif
                    @if(isset($_GET['growMode']) and $_GET['growMode'] == 'move')
                    <div class="col-md-12">
                        <table class="table table-striped m-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Metric ID</th>
                                    <th>Parent Metric ID</th>
                                    <th>Source</th>
                                    <th>Destination</th>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_lists as $key => $product_list)
                                <tr id="growingRow{{$key}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$product_list->label}}</td>
                                    <td>{{$product_list->rfid}}</td>
                                    <td>{{$product_list->parent_rfid}}</td>
                                    <td>{{$product_list->srcname}}</td>
                                    <td>{{$product_list->dstname}}</td>
                                    <td><button class="btn btn-sm btn-warning removeGrowing" onclick='removeGrowing( "{{$product_list->rfid}}", "{{$product_list->label}}", "{{$key}}" )'>Remove</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>    
                    @endif
                    @if(isset($_GET['growMode']) and $_GET['growMode'] == 'release')
                     <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Metric ID</th>
                                    <th>Parent Metric ID</th>
                                    <th>Flower weight</th>
                                    <th>Waste weight</th>
                                    <th>Source</th>
                                    <th>Store</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_lists as $key => $product_list)
                                <tr id="growingRow{{$key}}">
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$product_list->label}}</td>
                                    <td>{{$product_list->rfid}}</td>
                                    <td>{{$product_list->parent_rfid}}</td>
                                    <td>{{$product_list->flowerweight}}</td>
                                    <td>{{$product_list->wasteweight}}</td>
                                    <td>{{$product_list->srcname}}</td>
                                    <td>{{$product_list->dstname}}</td>
                                    <td><button class="btn btn-sm btn-warning removeGrowing" onclick='removeGrowing( "{{$product_list->rfid}}", "{{$product_list->label}}", "{{$key}}" )'>Remove</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                 </div>  
            </div>
        </div>
    </div>
</div>
<!-- add new grow Modal start-->
    <div class="modal fade" id="addNewGrowModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="addNewGrowModalLabel">New Grow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="POST" action="/grow/growing/growingAddGrow?growMenu=visible&growMode=new">
                        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Grow Area </label>
                                <div class="col-sm-9">
                                    <select name="growArea" id="growingSelect" class="form-control show-tick">
                                        @foreach ($growAreas as $key => $growArea): ?>
                                            <option value="{{$growArea->id}}">{{$growArea->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Process Date</label>
                                <div class="col-sm-9">
                                    <input id="processDate" name="processDate" type="date" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input name="productName" class="form-control productNameList" placeholder="" type="text">
                                    <input type="hidden" name="productId" id="sel_product_id">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="" class="col-sm-3 col-form-label"></label>
                                <div class="col-md-9">
                                    <a href="#" class="btn btn-primary">Add New Product</a>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Metric Id</label>
                                <div class="col-sm-9">
                                    <input type="text" name="metricId" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Parent Metric Id</label>
                                <div class="col-sm-9">
                                    <input type="text" name="parentMetricId" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Column</label>
                                <div class="col-sm-9">
                                    <input type="text" name="col" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Row</label>
                                <div class="col-sm-9">
                                    <input type="text" name="row" class="form-control" placeholder="">
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

<!-- add move grow Modal start-->
    <div class="modal fade" id="addMoveGrowModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="addMoveGrowModalLabel">Move Grow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="POST" action="/grow/growing/growingAddGrow?growMenu=visible&growMode=move">
                        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Grow List </label>
                                <div class="col-sm-9">
                                    <select id="growArea" name="growArea" class="form-control show-tick">
                                        @foreach ($growAreas as $key => $growArea)
                                        <option value="{{$growArea->id}}">{{$growArea->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Source Room </label>
                                <div class="col-sm-9">
                                    <select id="sourceRoom" name="sourceRoom" class="form-control show-tick">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Destination Room </label>
                                <div class="col-sm-9">
                                    <select id="destinationRoom" name="destinationRoom" class="form-control show-tick">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Process Date</label>
                                <div class="col-sm-9">
                                    <input  type="date" value="{{date('m / d / Y')}}" class="form-control" placeholder="" name="processDate">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input name="productName" class="form-control productNameList" placeholder="" type="text">
                                    <input type="hidden" name="productId" id="" class="productId">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Metric Id</label>
                                <div class="col-sm-9">
                                    <input name="metricId" type="text" class="form-control" placeholder="">
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
<!-- add move area modal end -->


<!-- add release grow Modal start-->
    <div class="modal fade" id="addReleaseGrowModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="addReleaseGrowModalLabel">Release Grow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="POST" action="/grow/growing/growingAddGrow?growMenu=visible&growMode=release">
                        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Grow Area </label>
                                <div class="col-sm-9">
                                    <select name="growArea" class="form-control show-tick">
                                        @foreach ($growAreas as $key => $growArea)
                                            @foreach( $growRooms as $growRoom)
                                                @if(($growRoom->type == 5) and ($growRoom->parent_id == $growArea->id))
                                                    <option value="{{$growRoom->id}}">{{$growArea->name}}- {{$growRoom->name}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Process Date</label>
                                <div class="col-sm-9">
                                    <input type="date" name="processDate" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input name="productName" class="form-control productNameList" placeholder="" type="text">
                                    <input type="hidden" name="productId" id="" class="productId">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Metric Id</label>
                                <div class="col-sm-9">
                                    <input type="text" name="metricId" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Flower Weight</label>
                                <div class="col-sm-9">
                                    <input type="text" name="flowerWeight" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Waste Weight</label>
                                <div class="col-sm-9">
                                    <input type="text" name="wasteWeight" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">WareHouse </label>
                                <div class="col-sm-9">
                                    <select id="wareHouse" name="wareHouse" class="form-control show-tick">
                                        @if($warehouseList)
                                            @foreach($warehouseList as $warehouse)
                                                <option value="{{$warehouse->rowid}}">{{$warehouse->label}}</option>
                                            @endforeach
                                        @endif
                                    </select>
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
<!-- add move area modal end -->
@endsection

