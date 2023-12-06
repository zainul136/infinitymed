@section('admin_title','Dashboard')
@extends('admin.layouts.master')
@section('main-content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Service</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($services as $service)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$service->name}}</td>
                                            <td>
                                                <a href="/admin/services/{{$service->image}}">
                                                    <img src="/admin/services/{{$service->image}}" height="100px" width="100px">
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-primary" href="{{ route('services.show', $service->id) }}">
                                                    View
                                                </a>
                                                <a class="btn btn-xs btn-success" href="{{ route('services.edit', $service->id) }}">
                                                    Edit
                                                </a>
                                                <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                                    onsubmit="return confirm('{{ trans('Do you want delete?') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger"
                                                        value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
