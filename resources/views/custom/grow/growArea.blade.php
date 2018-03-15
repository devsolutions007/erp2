@extends('layouts.app')

@section('content')
 <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Grow Area</h2>                
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <table class="table table-striped">
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
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <form>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Name :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Type :</label>
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
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Licence Number :</label>
                                            <input class="form-control" placeholder="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                </div> 
                            </div>
                            <div class="row clearfix">  
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <button type="button" class="btn btn-default waves-effect">Add</button>
                                    <button type="button" class="btn btn-default waves-effect">Update</button>
                                    <button type="button" class="btn btn-default waves-effect">Remove</button>
                                </div>
                            </div>    
                        </form>
                    </div>
                 </div>  
            </div>
        </div>
    </div>
</div>

@endsection

