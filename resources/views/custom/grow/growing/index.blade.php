@extends('layouts.app')

@section('content')
<div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card top-blue-bdr">
            <div class="card-header">
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                Grow List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addNewGrowModal">Add New Grow</button>  
                @endif 
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'move')
                Move Grow List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addMoveGrowModal">Add Move Grow</button> 
                @endif 
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'release')
                Release Grow List
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addReleaseGrowModal">Add Release Grow</button>  
                @endif              
            </div>
            <div class="card-body">
                <div class="row">
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                </tr>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                    <td>Otto</td>
                                </tr>
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
                        <h5 class="modal-title text-center" id="addNewGrowModalLabel">Add New Grow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Grow Area </label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Process Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="bs-datepicker form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="" type="text">
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
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Parent Metric Id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Column</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Row</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-primary">Remove</button>
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
                        <h5 class="modal-title text-center" id="addMoveGrowModalLabel">Add Move Grow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Grow List </label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Source Room </label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Destination Room </label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Process Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="bs-datepicker form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Metric Id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-primary">Remove</button>
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
                        <h5 class="modal-title text-center" id="addReleaseGrowModalLabel">Add Move Grow</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal">
                        <div class="modal-body">
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Grow Area </label>
                                <div class="col-sm-9">
                                    <select class="form-control show-tick">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Process Date</label>
                                <div class="col-sm-9">
                                    <input type="text" class="bs-datepicker form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label for="" class="col-sm-3 col-form-label">Product</label>
                                <div class="col-sm-9">
                                    <input class="form-control" placeholder="" type="text">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Metric Id</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Flower Weight</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">Waste Weight</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group row gutters">
                                <label class="col-sm-3 col-form-label">WareHouse </label>
                                <div class="col-sm-9">
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-primary">Remove</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>   
                </div>
            </div>
        </div>
    </div>
<!-- add move area modal end -->
@endsection

