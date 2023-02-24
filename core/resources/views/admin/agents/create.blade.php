@extends('admin.layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                    class="fas fa-home"></i>{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">Category<span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <select name="contact_services_id" class="form-control">
                                            @foreach ($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">Subcategory Name<span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                        @if ($errors->has('name'))
                                            <p class="text-danger"> {{ $errors->first('name') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Agent Image<span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="image">Agent Image</label>
                                            <input type="file" class="custom-file-input up-img" name="image" id="image">
                                        </div>
                                        @if ($errors->has('image'))
                                            <p class="text-danger"> {{ $errors->first('image') }} </p>
                                        @endif
                                        <p class="help-block text-info">{{ __('Upload 270X290 (Pixel) Size image for best quality.
                                            Only jpg, jpeg, png image is allowed.') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 control-label">Agent Name<span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="agent_name" placeholder="Name">
                                        @if ($errors->has('agent_name'))
                                            <p class="text-danger"> {{ $errors->first('agent_name') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 control-label">Agent Email<span class="text-danger">*</span></label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="agent_email" placeholder="Email">
                                        @if ($errors->has('agent_email'))
                                            <p class="text-danger"> {{ $errors->first('agent_email') }} </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
