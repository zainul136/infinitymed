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
                                <h4>Show Weight Loss</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-border">
                                    <tr>
                                        <td>
                                            <b>Description</b>
                                        </td>
                                        <td>
                                            {!!$weightLoss->description  !!}
                                        </td>
                                    </tr>
                                </table>
                                <a href="{{route('weight-loss.index')}}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
