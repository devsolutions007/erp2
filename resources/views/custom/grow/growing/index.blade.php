@extends('layouts.app')

@section('content')
 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                <h2>New Grow</h2>  
                @endif 
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'move')
                <h2>Move Grow</h2>  
                @endif 
                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'release')
                <h2>Release Grow</h2>  
                @endif              
            </div>
            <div class="body">
                <div class="row clearfix">
                    @if(isset($_GET['growMode']) and ($_GET['growMode'] == 'new' or $_GET['growMode'] == 'move'))
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <form>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Process Date :</label>
                                            <input type="text" class="datepicker form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if(isset($_GET['growMode']) and $_GET['growMode'] == 'move')

                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Source Room :</label>
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
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Destination Room :</label>
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
                            </div>

                            @endif
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Product :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a href="#" class="btn btn-default waves-effect">Add New Product</a>
                                </div>
                            </div>
                            <div class="row clearfix">     
                                @endif
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Metric Id :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Parent Metric Id :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div> 
                                @endif
                            </div>
                            @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Column :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Row :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            @endif
                            @if(isset($_GET['growMode']) and $_GET['growMode'] == 'release')
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Flower Weight :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Waste Weight :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>WareHouse :</label>
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
                            </div>
                            @endif
                            <div class="row clearfix">  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="button" class="btn btn-default waves-effect">Add</button>
                                    <button type="button" class="btn btn-default waves-effect">Remove</button>
                                </div>
                            </div>    
                        </form>
                    </div>
                    @endif
                    @if(isset($_GET['growMode']) and $_GET['growMode'] == 'release')
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <form>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Process Date :</label>
                                            <input type="text" class="datepicker form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Product :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Metric Id :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Flower Weight :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Waste Weight :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>WareHouse :</label>
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
                            </div>
                            <div class="row clearfix">  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="button" class="btn btn-default waves-effect">Add</button>
                                    <button type="button" class="btn btn-default waves-effect">Remove</button>
                                </div>
                            </div>    
                        </form>
                    </div>
                    @endif
                    
                    @if(isset($_GET['growMode']) and $_GET['growMode'] == 'new')
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <table class="table table-striped">
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
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <table class="table table-striped">
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
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
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

@endsection

