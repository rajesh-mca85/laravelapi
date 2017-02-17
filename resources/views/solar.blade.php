@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Solar System
                    <span style="float: right;"><a href="{{ url('solar/add') }}">Add New</a></span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-bordered hover">
                          <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Solar Name</th>
                                    <th>Solar Size</th>
                                </tr>
                          </thead>
                          <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>sdsd</td>
                                    <td>45.3</td>
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