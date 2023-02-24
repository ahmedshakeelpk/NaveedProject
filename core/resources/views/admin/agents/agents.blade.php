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
                        <div class="card-header">
                            {{-- <h3 class="card-title">Agents List</h3> --}}
                            <div class="card-tools d-flex">
                                <a href="{{ route('admin.agents.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Add Agent & Category
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="idtable" class="table table-bordered table-striped data_table">
                                <thead>
                                    <tr>
                                        {{-- <th>
                                            <input type="checkbox" data-target="product-bulk-delete" class="bulk_all_delete">
                                        </th> --}}
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Category</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($agents as $agent)
                                        <tr id="product-bulk-delete">
                                            {{-- <td>
                                                <input type="checkbox" class="bulk-item" value="{{ $agent->id }} ">
                                            </td> --}}
                                            <td>{{ $agent->id }}</td>
                                            <td>
                                                @if ($agent->agent_img)
                                                    <img class="w-80" src="{{ asset('assets/front/img/' . $agent->agent_img) }}" alt="" />
                                                @else
                                                    No Image set
                                                @endif
                                            </td>
                                            <td>{{ $agent->agent_name }}</td>
                                            <td>{{ $agent->agent_email }}</td>
                                            <td>{{ $agent->contactServices->name }} / {{ $agent->name }}</td>
                                            {{-- <td>{{ var_dump($agent) }}</td> --}}
                                            <td>
                                                <a href="{{ route('admin.agents.edit', $agent->id) }}"
                                                    class="btn btn-info btn-sm"
                                                >
                                                    <i class="fas fa-pencil-alt"></i>{{ __('Edit') }}
                                                </a>
                                                <form class="d-inline-block"
                                                    action="{{ route('admin.agents.delete') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $agent->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmSubmit();">
                                                        <i class="fas fa-trash"></i>{{ __('Delete') }}
                                                    </button>
                                                    <script>
                                                        function confirmSubmit() {
                                                            return confirm("Are you sure you wish to delete this Agent? This action is not reversible.");
                                                        }
                                                    </script>
                                                </form>
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
