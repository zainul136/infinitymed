@section('admin_title','Profile Update')
@extends('admin.layouts.master')
@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row mt-sm-6">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Personal Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="py-4">
                                    <p class="clearfix">
                        <span class="float-left">
                          Name
                        </span>
                                        <span class="float-right text-muted">
                          {{auth()->user()->name}}
                        </span>
                                    </p>
                                    <p class="clearfix">
                        <span class="float-left">
                          Phone
                        </span>
                                        <span class="float-right text-muted">
                          {{auth()->user()->phone}}
                        </span>
                                    </p>
                                    <p class="clearfix">
                        <span class="float-left">
                          Mail
                        </span>
                                        <span class="float-right text-muted">
                          {{auth()->user()->email}}
                        </span>
                                    </p>
                                    <p class="clearfix">
                        <span class="float-left">
                          Street
                        </span>
                                        <span class="float-right text-muted">
                          <a href="#">{{auth()->user()->street}}</a>
                        </span>
                                    </p>
                                    <p class="clearfix">
                        <span class="float-left">
                          State
                        </span>
                                        <span class="float-right text-muted">
                          <a href="#">{{auth()->user()->state}}</a>
                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Personal Details</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('update-admin-profile')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" value="{{auth()->user()->name}}" name="name" class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" value="{{auth()->user()->email}}" name="email"
                                                       readonly class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" value="{{auth()->user()->phone}}" name="phone"
                                                       class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Street</label>
                                                <input type="text" value="{{auth()->user()->street}}" name="street"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" value="{{auth()->user()->city}}" name="city"
                                                       class="form-control">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" value="{{auth()->user()->state}}" name="state"
                                                       class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="profile_image" class="form-control">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
