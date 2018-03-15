@extends('layouts.app')

@section('content')
   <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form>
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Grow Area :</label>
                                        <select class="form-control show-tick">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Rooms :</label>
                                        <select class="form-control show-tick">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Time in Rooms :</label>
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Metric ID :</label>
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" class="btn btn-default waves-effect">Search</button>
                                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#addPlantModal">Add</button>
                                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#bulkMoveModal">Move</button>
                                <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#bulkReleaseModal">Release</button>
                                <button type="button" class="btn btn-default waves-effect" onclick="showConfirmMessageGrow()">Remove</button>
                                <ul class="header-dropdown m-r--5" style="list-style: none; display: inline-block; padding-left: 15px;">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="btn btn-default waves-effect dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">backup</i> File Upload
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th><input type="checkbox" id="grow_checkbox_1" class="filled-in"/>
                                         <label for="grow_checkbox_1"></label></th>
                                        <th>Strain</th>
                                        <th>Birthdate</th>
                                        <th>Time in Room</th>
                                        <th>Room(R , C)</th>
                                        <th>Metric ID</th>
                                        <th>States</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <th><input type="checkbox" id="grow_checkbox_2" class="filled-in"/>
                                         <label for="grow_checkbox_2"></label></th>
                                        <td>Apothecanna - (0.5oz) Super Salve</td>
                                        <td>2017-12-19</td>
                                        <td>86 days</td>
                                        <td>room-Drying (0 , 9)</td>
                                        <td>1A400021266EE22000009365</td>
                                        <td>harvest-drying</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                         <th><input type="checkbox" id="grow_checkbox_3" class="filled-in"/>
                                         <label for="grow_checkbox_3"></label></th>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <th><input type="checkbox" id="grow_checkbox_4" class="filled-in"/>
                                         <label for="grow_checkbox_4"></label></th>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>@mdo</td>
                                    </tr>
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
                <div class="card">
                    <div class="modal-header header">
                        <h4 class="modal-title" id="addPlantModalLabel">Add Plant</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body body">
                        
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="addPlantDate">Date</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <input type="text" class="datepicker form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="addPlantGrowArea">Grow Area</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="addPlantGrowArea" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="addPlantProduct">Product</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="addPlantProduct" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="addPlantMetricID">Metric ID</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="addPlantMetricID" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="addPlantParentID">Parent ID</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="addPlantParentID" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                    
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="addPlantRow" class="form-control" placeholder="row">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="addPlantColumn" class="form-control" placeholder="column">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-7">
                                    
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">Save</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
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
            <div class="modal-content">
                <div class="card">
                    <div class="modal-header header">
                        <h4 class="modal-title" id="bulkMoveModalLabel">Bulk Move</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body body">
                        
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkMoveDate">Date</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="bulkMoveDate" type="text" class="datepicker form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkMoveGrowArea">Grow Area</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bulkMoveGrowArea" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="moveBulkSource">Source</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="moveBulkSource" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkMoveDestination">Destination</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select id="bulkMoveDestination" class="form-control show-tick">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkMoveCount">Count</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bulkMoveCount" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">Save</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
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
                <div class="card">
                    <div class="modal-header header">
                        <h4 class="modal-title" id="bulkReleaseModalLabel">Bulk Release</h4>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body body">
                        
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkReleaseDate">Date</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="bulkReleaseDate" type="text" class="datepicker form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkReleaseGrowArea">Grow Area</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bulkReleaseGrowArea" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="ReleaseBulkSource">Source</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="ReleaseBulkSource" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkReleaseDestination">Destination</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select id="bulkReleaseDestination" class="form-control show-tick">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="bulkReleaseCount">Count</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bulkReleaseCount" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                    
                                </div>
                                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bulkReleaseFlowerWeight" class="form-control" placeholder="Flower weight">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-2 col-sm-3 col-xs-5">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="bulkReleaseWasteWeight" class="form-control" placeholder="Waste weight">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-3 col-xs-7">
                                    
                                </div>
                            </div>
                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">Save</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    <!-- Bulk Release modal end -->
@stop

