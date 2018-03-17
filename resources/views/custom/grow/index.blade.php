@extends('layouts.app')

@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card top-blue-bdr">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3">
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
                            <label for="" class="col-form-label">Time in Rooms</label>
                            <input type="email" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="" class="col-form-label">Metric ID</label>
                            <input type="email" class="form-control" id="" placeholder="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="" class="col-form-label" style="opacity: 0; display: block;">Search</label>
                            <button class="btn btn-block btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addPlantModal">Add</button>
                        </div>
                        <div class="form-group col-md-1">
                            <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#bulkMoveModal">Move</button>
                        </div>
                        <div class="form-group col-md-1">
                               <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#bulkReleaseModal">Release</button>
                        </div>
                        <ul class="col-md-2">
                            <li class="dropdown">
                                <a class="btn btn-block btn-primary dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    File Upload
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                    <a class="dropdown-item" href="#">Add File</a>
                                    <a class="dropdown-item" href="#">Move File</a>
                                    <a class="dropdown-item" href="#">Release File</a>
                                    <a class="dropdown-item" href="#">Remove File</a>
                                    <a class="dropdown-item" href="#">State Change</a>
                                </div>
                            </li>
                        </ul>
                    </div> 
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped m-0">
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
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="addPlantModalLabel">Add Plant</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label for="addPlantDate" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <div class="datepicket-container blue">
                                        <input class="datepicker form-control" id="addPlantDate" placeholder="Date" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addPlantGrowArea" class="col-sm-3 col-form-label">Grow Area</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="addPlantGrowArea" placeholder="Grow Area" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addPlantProduct" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="addPlantProduct" placeholder="Product" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addPlantMetricID" class="col-sm-3 col-form-label">Metric ID</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="addPlantMetricID" placeholder="Metric ID" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addPlantParentID" class="col-sm-3 col-form-label">Parent ID</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="addPlantParentID" placeholder="Parent ID" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <div class="col-sm-6">
                                    <input type="text" id="addPlantRow" class="form-control" placeholder="Row">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="addPlantColumn" class="form-control" placeholder="Column">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save</button>
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
                                    <input class="datepicker form-control" id="bulkMovetDate" placeholder="Date" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="bulkMoveGrowArea" class="col-sm-3 col-form-label">Grow Area</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="bulkMoveGrowArea" placeholder="Grow Area" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="bulkMoveSource" class="col-sm-3 col-form-label">Source</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="bulkMoveSource" placeholder="Source" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="bulkMoveDestination" class="col-sm-3 col-form-label">Destination</label>
                                <div class="col-sm-9">
                                    <select id="bulkMoveDestination" class="form-control show-tick">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="bulkMoveCount" class="col-sm-3 col-form-label">Count</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="bulkMoveCount" placeholder="Count" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save</button>
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
                                <label for="bulkReleasetDate" class="col-sm-3 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <input class="datepicker form-control" id="bulkReleasetDate" placeholder="Date" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="bulkReleaseGrowArea" class="col-sm-3 col-form-label">Grow Area</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="bulkReleaseGrowArea" placeholder="Grow Area" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="bulkReleaseDestination" class="col-sm-3 col-form-label">Destination</label>
                                <div class="col-sm-9">
                                    <select id="bulkReleaseDestination" class="form-control show-tick">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="bulkReleaseCount" class="col-sm-3 col-form-label">Count</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="bulkReleaseCount" placeholder="Count" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <div class="col-sm-6">
                                    <input type="text" id="bulkReleaseFlowerWeight" class="form-control" placeholder="Flower weight">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" id="bulkReleaseWasteWeight" class="form-control" placeholder="Waste weight">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </div>
    <!-- Bulk Release modal end -->
@stop

