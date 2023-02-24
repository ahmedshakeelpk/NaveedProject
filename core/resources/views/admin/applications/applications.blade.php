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
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="idtable" class="table table-bordered table-striped data_table">
                                <thead>
                                    <tr>
                                        {{-- <th>
                                            <input type="checkbox" data-target="product-bulk-delete" class="bulk_all_delete">
                                        </th> --}}
                                        <th>ID</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Form</th>
                                        <th>Attachments</th>
                                        <th>Status</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($applications as $app)
                                        <tr id="product-bulk-delete">
                                            {{-- <td>
                                                <input type="checkbox" class="bulk-item" value="{{ $agent->id }} ">
                                            </td> --}}
                                            <td>{{ $app->id }}</td>
                                            <td>{{ $app->name }}</td>
                                            <td>{{ $app->user->name }}</td>
                                            <td>{{ $app->user->email }}</td>
                                            <td>{{ $app->user->phone ?? "N/A" }}</td>
                                            <td>
                                                <a href="{{ asset('assets/forms/'.$app->form) }}" target="_blank">
                                                    View Form
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ asset('assets/attachments/'.$app->attachments) }}" target="_blank">
                                                    View Attachments
                                                </a>
                                            </td>
                                            <td>
                                                <span class="{{ $app->status_color }}">
                                                    {{ $app->status }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($app->status == "In Process")
                                                    <form action="{{ route('admin.applications.accept') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $app->id }}" />
                                                        <button type="submit" class="btn btn-success btn-sm mb-1">
                                                            Accept
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('admin.applications.reject') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $app->id }}" />
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Reject
                                                        </button>
                                                    </form>
                                                @elseif ($app->status == "Pending Review")
                                                    <form action="{{ route('admin.applications.process') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $app->id }}" />
                                                        <button type="submit" class="btn btn-info btn-sm">
                                                            Process
                                                        </button>
                                                    </form>
                                                @endif
                                                
                                                
                                                {{-- <form id="deleteform" class="d-inline-block"
                                                    action="{{ route('admin.product.delete', $agent->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $agent->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                    </button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
