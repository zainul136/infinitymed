@section('admin_title','Product')
@extends('admin.layouts.master')
@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Products</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service</th>
                                            <th>Product Name</th>
                                            <th>Product Images</th>
                                            <th>Product Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$product->services->name ??''}}</td>
                                                <td>{{$product->name ??''}}</td>
                                                <td><img src="{{asset('assets/products-images/'.$product->images)??''}}" width="50" height="50" alt=""></td>

                                                <td>{{$product->description ??''}}</td>
                                                <td>
                                                    <a class="btn btn-xs btn-success" href="{{ route('product.edit', $product->id) }}">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                          onsubmit="return confirm('{{ trans('Do you want delete?') }}');"
                                                          style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-danger" value="Delete" id="show-sweetalert">Delete</button>
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
