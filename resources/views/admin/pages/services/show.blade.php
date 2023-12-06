@section('admin_title','Dashboard')
@extends('admin.layouts.master')
@section('main-content')
<meta name="_token" content="{{ csrf_token() }}">
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Show Service</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-border">
                                <tr>
                                    <td>
                                        <b>Name</b>
                                    </td>
                                    <td>
                                        {{$service->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Slug</b>
                                    </td>
                                    <td>
                                        {{$service->slug}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Image</b>
                                    </td>
                                    <td>
                                        <a href="/admin/services/{{$service->image}}">
                                            <img src="/admin/services/{{$service->image}}" class="m-2" height="100px" width="100px">
                                        </a>
                                    </td>
                                </tr>
                            </table>
                            <a href="{{route('service.index')}}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection