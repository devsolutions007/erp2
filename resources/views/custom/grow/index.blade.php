@extends('layouts.app')
<style type="text/css">
.modal-lg {
    max-width: 1000px !important;
}
</style>
@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card top-blue-bdr">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="growArea" class="col-form-label">Grow Area</label>
                            <select id="growArea" class="form-control">
                                @foreach( $growAreas as $growArea )
                                <option value="{{ $growArea->id }}">{{ $growArea->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="growRooms" class="col-form-label">Rooms</label>
                            <select id="growRooms" class="form-control">
                                <option value="all">All</option>
                                @if($growRooms)
                                    @foreach( $growRooms as $growRoom )
                                    <option value="{{ $growRoom->id }}">{{ $growRoom->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="roomTime" class="col-form-label">Time in Rooms</label>
                            <input type="text" class="form-control" id="roomTime" placeholder="Enter values in days">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="metricId" class="col-form-label">Metric ID</label>
                            <input type="text" class="form-control" id="metricId" placeholder="Enter Mertic Id">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="" class="col-form-label" style="opacity: 0; display: block;">Search</label>
                            <button id="searchBtnGrow" class="btn btn-block btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <button type="button" id="addnew_grow" class="btn btn-block btn-primary searchfilter_btn">Add</button>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="button" class="btn btn-block btn-primary searchfilter_btn" id="move_grow">Move</button>
                        </div>
                        <div class="form-group col-md-1">
                               <button type="button" class="btn btn-block btn-primary searchfilter_btn" id="release_grow">Release</button>
                        </div>
                        <div class="form-group col-md-1">
                               <button type="button" class="btn btn-block btn-primary searchfilter_btn" id="remove_grow">Remove</button>
                        </div>
                        <ul class="col-md-2">
                            <li class="dropdown">
                                <a class="btn btn-block btn-primary dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    File Upload
                                </a>
                                <ul id="fileupload_menu" aria-labelledby="navbarDropdown1" class="dropdown-menu fileupload_menu">
                                    <li>
                                        <label for="stock_file_add" class="img_cursor_show add_file_label">
                                            Add file
                                        </label>
                                        <input type="file" name="file" id="stock_file_add"/>
                                    </li>
                                    <li>
                                        <label for="stock_file_move" class="img_cursor_show move_file_label">
                                            Move file
                                        </label>
                                        <input type="file" name="file" id="stock_file_move"/>
                                    </li>
                                    <li>
                                        <label for="stock_file_release" class="img_cursor_show">
                                            Release file
                                        </label>
                                        <input type="file" name="file" id="stock_file_release"/>
                                    </li>
                                    <li>
                                        <label for="stock_file_remove" class="img_cursor_show">
                                            Remove file
                                        </label>
                                        <input type="file" name="file" id="stock_file_remove"/>
                                    </li>
                                    <li class="fileupload_menu_margin_bottom">
                                        <label for="stock_file_state" class="img_cursor_show">
                                            State change
                                        </label>
                                        <input type="file" name="file" id="stock_file_state"/>
                                    </li>
                                </ul>
                                    <!-- <input type="file" name="addPlant" value="Add File">
                                    <input type="file" name="addPlant" value="Move File">
                                    <input type="file" name="addPlant" value="Release File">
                                    <input type="file" name="addPlant" value="Remove File">
                                    <input type="file" name="addPlant" value="State Change"> -->
                            </li>
                        </ul>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <table id="" class="table table-striped m-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th><input id="checkallactions" name="checkallactions" class="checkallactions" type="checkbox"></th>
                                        <th>Strain</th>
                                        <th>Birthdate</th>
                                        <th>Time in Room</th>
                                        <th>Room(R , C)</th>
                                        <th>Metric ID</th>
                                        <th>States</th>
                                    </tr>
                                </thead>
                                <tbody id="search_table_body">
                                </tbody>
                            </table>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </div>
    <!-- add plant Modal start-->
    <div class="modal fade" id="addPlantModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="addPlantModalLabel">Add Plant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="alert custom alert-danger error-message" style="display: none;"></div>
                            <div class="form-group row gutters">
                                <label for="addPlantDate" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="fiscalyear" placeholder="Date" value="{{ date('m/d/Y')}}" type="text">
                                    
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="modal_add_src" class="col-sm-3 col-form-label">Grow Area</label>
                                <div class="col-sm-9">
                                    <input  class="form-control" id="modal_add_src" placeholder="Grow Area" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addPlantProduct" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input class="form-control productNameList" name="productName" id="addPlantProduct" placeholder="Product" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="rfid" class="col-sm-3 col-form-label">Metric ID</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="rfid" placeholder="Metric ID" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="p_rfid" class="col-sm-3 col-form-label">Parent ID</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="p_rfid" placeholder="Parent ID" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <div class="col-sm-6">
                                    <input type="text" id="row_val" class="form-control" placeholder="Row">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="col_val" class="form-control" placeholder="Column">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input name="sel_product_id" id="sel_product_id" type="hidden">
                            <button type="button" id="bulk_add_grow" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
    <!-- add plant modal end -->
    <!-- Bulk move modal start-->
    <div class="modal fade" id="bulkMoveModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content"> <div class="card">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bulkMoveModalLabel">Bulk Move</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> 
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label for="bulkMovetDate" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" id="movegrowfiscalyear" placeholder="Date" value="{{ date('m/d/Y')}}" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="modal_move_src" class="col-sm-3 col-form-label">Grow Area</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="modal_move_src" placeholder="Grow Area" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="modal_home_src" class="col-sm-3 col-form-label">Source</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="modal_home_src" placeholder="Source" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="home_dst_val" class="col-sm-3 col-form-label">Destination</label>
                                <div class="col-sm-9">
                                    <select id="home_dst_val" class="form-control show-tick">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="modal_checklist_count" class="col-sm-3 col-form-label">Count</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="modal_checklist_count" placeholder="Count" type="text" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="bulk_move_grow">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bulk move modal end -->
    <!-- Bulk Release modal start-->
    <div class="modal fade" id="bulkReleaseModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bulkReleaseModalLabel">Bulk Release</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label for="releasefiscalyear" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input name="releasefiscalyear" type="date" class="form-control" id="releasefiscalyear" placeholder="Date" value="{{ date('m/d/Y')}}" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="modal_release_src" class="col-sm-3 col-form-label">Grow Area</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="modal_release_src" id="modal_release_src" placeholder="Grow Area" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="idwarehouse" class="col-sm-3 col-form-label">Destination</label>
                                <div class="col-sm-9">
                                    <select id="idwarehouse" class="form-control show-tick">
                                        @if($warehouseList)
                                            @foreach($warehouseList as $warehouse)
                                                <option value="{{$warehouse->id}}">{{$warehouse->label}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="modal_checklist_count_rel" class="col-sm-3 col-form-label">Count</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="modal_checklist_count_rel" name="modal_checklist_count_rel" placeholder="Count" type="text" readonly>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <div class="col-sm-6">
                                    <input type="text" name="fl_weight" id="fl_weight" class="form-control" placeholder="Flower weight">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="wa_weight" name="wa_weight" class="form-control" placeholder="Waste weight">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="bulk_release_grow">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    <!-- Bulk Release modal end -->
    <!-- File Uplaod Modal -->
    <!-- Add plant by upload modal start-->
    <div class="modal fade" id="addPlantUploadModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPlantUploadModalLabel">Add Plant</h5>
                    <div>
                        <select id="fileupload_room_select" class="form-control">
                            <option value="all">All</option>
                            @if($growRooms)
                                @foreach( $growRooms as $growRoom )
                                <option value="{{ $growRoom->id }}">{{ $growRoom->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="div-scroll">
                            <table class="table table-sm m-0 modal-table-style">
                                <thead>
                                    <th>SL No</th>
                                    <th>Metric Id</th>
                                    <th>Row / Col</th>
                                    <th>State</th>
                                    <th>Strain</th>
                                    <th>Parent Metric Id</th>
                                    <th>x</th>
                                </thead>
                                <tbody id="addfile_modal_detail_data">
                                    
                                </tbody>
                            </table>
                        </div>    
                        <p class="alert alert-warning" id="modal_dialog_alert_add_data" style="display: none; color: #da1113;"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="fileupload_add_success">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
    <!-- Add Plant modal by upload file end -->

    <!-- Move Plant by upload modal start-->
    <div class="modal fade" id="movefile_modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-md-3" id="movefile_modalLabel">Move Plant</h5>
                    <div class="col-md-1">
                        <label for="move_select_src" class="col-form-label">Source</label>
                    </div>
                    <div class="col-md-3">   
                        <input class="form-control" id="move_select_src" placeholder="Source" type="text" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="move_select_dst" class="col-sm-3 col-form-label">Destination</label>
                    </div>
                    <div class="col-md-3">    
                        <select id="move_select_dst" class="form-control show-tick"></select>
                    </div>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="div-scroll">
                            <table class="table table-sm m-0 modal-table-style">
                                <thead>
                                    <th>SL No</th>
                                    <th>Metric Id</th>
                                    <th>Source Row/Col</th>
                                    <th>Destination Row/Col</th>
                                    <th>State</th>
                                    <th>x</th>
                                </thead>
                                <tbody id="movefile_modal_detail_data">
                                    
                                </tbody>
                            </table>
                        </div>
                        <p class="alert alert-warning" id="modal_dialog_alert_move_data" style="display: none; color: #da1113;"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="fileupload_move_success">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
    <!-- Move Plant modal by upload file end -->


    <!-- Release Plant by upload modal start-->
    <div class="modal fade" id="releasefile_modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-md-9" id="releasefile_modalLabel">Release Plant</h5>
                    <select id="release_stock_plant" class="col-md-3 form-control show-tick">
                            <option value=""></option>
                        @if($warehouseList)
                            @foreach($warehouseList as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->label}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="div-scroll">
                            <table class="table table-sm m-0 modal-table-style">
                                <thead>
                                    <th>SL No</th>
                                    <th>Metric Id</th>
                                    <th>Room</th>
                                    <th>Source Row/Col</th>
                                    <th>State</th>
                                    <th>x</th>
                                </thead>
                                <tbody id="releasefile_modal_detail_data">
                                    
                                </tbody>
                            </table>
                        </div>    
                        <p class="alert alert-warning" id="modal_dialog_alert_release_data" style="display: none; color: #da1113;"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="fileupload_release_success">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
    <!-- Release Plant modal by upload file end -->

     <!-- Remove Plant by upload modal start-->
    <div class="modal fade" id="removefile_modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-md-9" id="removefile_modalLabel">Remove Plant</h5>
                    <select id="idwarehouse" class="col-md-3 form-control show-tick">
                            <option value=""></option>
                        @if($warehouseList)
                            @foreach($warehouseList as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->label}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="div-scroll">
                            <table class="table table-sm m-0 modal-table-style">
                                <thead>
                                    <th>SL No</th>
                                    <th>Metric Id</th>
                                    <th>Room</th>
                                    <th>Source Row/Col</th>
                                    <th>State</th>
                                    <th>x</th>
                                </thead>
                                <tbody id="removefile_modal_detail_data">
                                    
                                </tbody>
                            </table>
                        </div>    
                        <p class="alert alert-warning" id="modal_dialog_alert_remove_data" style="display: none; color: #da1113;"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="fileupload_remove_success">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
    <!-- Remove Plant modal by upload file end -->

    <!-- State Change Plant by upload modal start-->
    <div class="modal fade" id="statefile_modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-md-9" id="removefile_modalLabel">State Change Plant</h5>
                </div>
                <form class="form-horizontal">
                    <div class="modal-body">
                        <div class="div-scroll">

                            <table class="table table-sm m-0 modal-table-style">
                                <thead>
                                    <th>SL No</th>
                                    <th>Metric Id</th>
                                    <th>Room</th>
                                    <th>Source Row/Col</th>
                                    <th>Now State</th>
                                    <th>Next State</th>
                                    <th>x</th>
                                </thead>
                                <tbody id="statefile_modal_detail_data">
                                    
                                </tbody>
                            </table>
                        </div>    
                        <p class="alert alert-warning" id="modal_dialog_alert_state_data" style="display: none; color: #da1113;"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="fileupload_state_success">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
    <!-- State Change Plant modal by upload file end -->
@stop

