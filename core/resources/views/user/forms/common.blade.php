@extends('front.layout')

@section('meta-keywords', "$seo->meta_keywords")
@section('meta-description', "$seo->meta_description")

@section('style')
    <!-- DataTable css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/data-table/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/data-table/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/data-table/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
    <!--Main Breadcrumb Area Start -->
    <div class="page-title-area" style="background-image: url('{{ asset('assets/front/img/' . $setting->breadcrumb_image) }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title">{{ $title }}</h2>
                        <ul class="breadcrumb-nav">
                            <li class=""><a href="{{ route('front.index') }}">{{ __('Home') }} </a></li>
                            <li class="active" aria-current="page">{{ $title }}</li>
                        </ul>
                    </div> <!-- page title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    <!--Main Breadcrumb Area End -->

    <!-- User Dashboard Start -->
    <section class="user-dashboard-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @includeif('user.dashboard-sidenav')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard-inner">
                        <div class="contact-form-area">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <hr class="bg-white" />
                                    <h3 class="form-title">
                                        {{ $title }}
                                    </h3>
                                    <hr class="bg-white" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-form">
                                        <form action="{{ route('user.apply') }}" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <input type="hidden" name="name" value="{{ $name ?? $title }}" />
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <p class="pb-3 text-danger">
                                                        Click the button below to download the form. Scan the filled form and attach it below.
                                                    </p>
                                                    <a href="{{asset('assets/downloads/'.$file)}}" download class="main-btn d-inline-block">
                                                        Download Form&nbsp;&nbsp;<i class="fal fa-download"></i>
                                                    </a>
                                                    <hr class="bg-white" />
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Form<span class="text-danger">*</span></label>
                                                    <input type="file" required name="form" class="px-0" />
                                                    @if ($errors->has('form'))
                                                        <p class="text-danger"> {{ $errors->first('form') }} </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <label>Attachments<span class="text-danger">*</span></label>
                                                    <label>All attachments must be inside a single pdf file</label>
                                                    <input type="file" required name="attachments" class="px-0" />
                                                    <label></label>
                                                    @if ($errors->has('attachments'))
                                                        <p class="text-danger"> {{ $errors->first('attachments') }} </p>
                                                    @endif
                                                </div>
                                                <div class="col-lg-12 text-right">
                                                    <hr class="bg-white" />
                                                    <button class="main-btn d-inline-block" 
                                                        type="submit"
                                                    >
                                                        Submit Application
                                                        <i class="fal fa-long-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard End -->
@endsection
