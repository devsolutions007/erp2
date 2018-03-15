@extends('layouts.app')

@section('content')
   <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Grow Setting Room</h2>
                </div>
                <div class="body">
                    <form>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6">
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
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                                <button type="button" class="btn btn-default waves-effect">Search</button>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                            </div>   
                        </div>
                    </form>            
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>General Setting</h2>
                                        </div>
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Growing days :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Expire Alarm Days :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Rows :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Columns :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>GUI Configuration</h2>
                                        </div>
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>OffsetX :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>OffsetY:</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>Block Configuration</h2>
                                        </div>
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Columns per block :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Rows per block :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Rows per block :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>W-gap between block :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>Cell Configuration</h2>
                                        </div>
                                        <div class="body">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Cell height of plant :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">   
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <label>Cell width of plant :</label>
                                                            <input class="form-control" placeholder="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                        </div> 
                     </div>  
                </div>
            </div>
        </div>
    </div>

@endsection

