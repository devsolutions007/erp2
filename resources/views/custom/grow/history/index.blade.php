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
                            </div>
                             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">   
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>From :</label>
                                        <input type="text" class="datepicker form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>To :</label>
                                        <input type="text" class="datepicker form-control" placeholder="">
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">   
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Metric ID :</label>
                                        <input class="form-control" placeholder="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <button type="button" class="btn btn-default waves-effect">Search</button>
                            </div>    
                        </div>
                    </form>            
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Date</th>
                                        <th>Product</th>
                                        <th>Metric ID</th>
                                        <th>From Place</th>
                                        <th>To Place</th>
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
                     </div>  
                </div>
            </div>
        </div>
    </div>

@endsection

