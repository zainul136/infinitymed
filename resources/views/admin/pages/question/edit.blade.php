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
                                <h4>Add Question</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('question.update',$question->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Heading</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="heading" class="form-control" value="{{old('heading',$question->heading)}}">
                                            @error('heading')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Service</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="service_id" class="form-control select2 " tabindex="-1" aria-hidden="true">
                                                @foreach($services as $service)
                                                    <option value="{{$service->id}}">{{$service->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('services')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
