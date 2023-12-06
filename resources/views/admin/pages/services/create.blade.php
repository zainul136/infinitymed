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
                            <h4>Create Service</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="required" for="name">Name</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" class="name" id="name" value="{{ old('name', '') }}" required>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="required" for="slug">Slug</label>
                                    <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" class="slug" id="slug" value="{{ old('name', '') }}" readonly>
                                    @if ($errors->has('slug'))
                                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="required" for="image">Profile Image</label>
                                    <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" class="image" id="image" value="{{ old('image', '') }}" required>
                                    @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger" type="submit">
                                        Save
                                    </button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#name').on('input', function() {
            var title = $(this).val();
            var slug = createSlug(title);
            $('#slug').val(slug);
        });

        function createSlug(text) {
            return text
                .toString()
                .toLowerCase()
                .trim()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-')
                .replace(/^-+/, '')
                .replace(/-+$/, '');
        }
    });
</script>
