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
                                            <th>Service Type</th>
                                            <th>Description</th>
                                            <th>Show</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($weightLosses as $weightLoss)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$weightLosse->services->name ?? ''}}</td>
                                                <td>{!! $weightLoss->description ?? ''!!}</td>
                                                <td><a class="btn btn-xs btn-primary" href="{{ route('weight-loss.show', $weightLoss->id) }}">View</a></td>
                                                <td><a class="btn btn-xs btn-success" href="{{ route('weight-loss.edit', $weightLoss->id) }}">Edit</a></td>
                                                <td>
                                                    <form action="{{ route('weight-loss.destroy', $weightLoss->id) }}" method="POST"
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
