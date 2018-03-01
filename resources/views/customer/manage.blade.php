@extends('layouts.master')

@section('content')


<div class="clear"></div>
<div class="grid_6">
    <div class="box">
        <div class="header">
            <h3>Locations</h3>
        </div>
        <div class="content no-padding">
            <table class="table">
                <head>
                <th>Location Name</th>
                <th>Total Customers</th>
                <th>SMS Opt-in Customers</th>
                </head>
                <tbody>
                @foreach($locations as $l)
                    <tr>
                        <td><a href="/customers/manage/{{$l->id}}">{{$l->name}}</a></td>
                        <td>{{$l->total}}</td>
                        <td>{{$l->sms_optin}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="grid_12">
    <div class="box">
        <div class="header">
            <h3>{{$locationName}}</h3>
        </div>
        <div class="content">
            <table id="customer-table" class="table">
                <thead>
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Cell</th>
                    <th>Email</th>
                    <th>State</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $c)
                <tr class="gradeX">
                    <td>{{$c->last_name}}</td>
                    <td>{{$c->first_name}}</td>
                    <td>{{$c->cell}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->state_of_residence}}</td>
                    <td class="center"><span><a href="/customers/edit/{{$c->id}}"><img src="/img/icons/16x16/pencil.png" /></a></span></td>
                    <td class="center"><span><img src="/img/icons/16x16/trashcan.png" /></span></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- End of .content -->
        <div class="clear"></div>
    </div> <!-- End of .box -->
</div> <!-- End of .grid_12 -->



<div class="clean"></div>

@endsection


@section('footscript')
    <script defer>
        $(window).load(function() {
            $('#customer-table').dataTable({
                "iDisplayLength": 50
            });
            //$(window).resize();
        });

    </script>
@endsection