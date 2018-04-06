@extends('layouts.app')

@section('content')
   <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card top-blue-bdr">
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="/grow/history/searchResult?growMenu=visible">
                        <input type="hidden"
                           name="_token"
                           value="{{ csrf_token() }}">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="growArea" class="col-form-label">Grow Area</label>
                                <select name="growArea" class="form-control show-tick">
                                    @foreach ($growAreas as $key => $growArea): ?>
                                    <option value="{{$growArea->id}}" {{ ($move_src == $growArea->id ) ? 'selected' : ''}}>{{$growArea->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="" class="col-form-label">From</label>
                                <input type="date" name="startdate" value="{{$startdate}}" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="" class="col-form-label">To</label>
                                <input type="date" name="lastdate" value="{{$lastdate}}" class="form-control" id="" placeholder="">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="" class="col-form-label">Metric ID</label>
                                <input type="type" value="{{$rfid}}" name="metricId" class="form-control" id="" placeholder="">
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
                                    @php $count = 1 @endphp
                                    @if($histories !== NULL)
                                        @foreach($histories as $key => $history)
                                        <tr>
                                            <th scope="row">{{$count}}</th>
                                            <td>{{$history->date}}</td>
                                            <td>{{$history->label}}</td>
                                            <td>{{$history->rfid}}</td>
                                            <td>{{$history->srcname}}</td>
                                            <td>{{$history->dstname}}</td>
                                        </tr>
                                        @php $count++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                     </div>  
                </div>
            </div>
        </div>
    </div>

@endsection

