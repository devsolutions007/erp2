@extends('layouts.app')

@section('content')
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card top-blue-bdr">
                <div class="card-header">Grow Area
                    <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addPlantModal">Add Grow Area</button>
                </div>
                <div class="card-body">
                    <!-- <div class="form-row">
                        <div class="form-group col-md-12 pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPlantModal">Add Grow Area</button>
                        </div>
                    </div> --> 
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped m-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Register Date</th>
                                        <th>Administrator</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
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
                        <h5 class="modal-title text-center" id="addPlantModalLabel">Add Grow Area</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label for="addPlantDate" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <div class="datepicket-container blue">
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addPlantGrowArea" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <select class="form-control">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="addPlantProduct" class="col-sm-3 col-form-label">Licence Number</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="" type="text">
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default">Add</button>
                            <button type="button" class="btn btn-default">Update</button>
                            <button type="button" class="btn btn-default">Remove</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
    <!-- add plant modal end -->

@endsection

