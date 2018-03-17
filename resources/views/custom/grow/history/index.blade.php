@extends('layouts.app')

@section('content')
   <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card top-blue-bdr">
                <div class="card-body">
                    <form>
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
                                <label for="" class="col-form-label">From</label>
                                <input type="email" class="datepicker form-control" id="" placeholder="">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="" class="col-form-label">To</label>
                                <input type="email" class="datepicker form-control" id="" placeholder="">
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
                    </form>            
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped m-0">
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

