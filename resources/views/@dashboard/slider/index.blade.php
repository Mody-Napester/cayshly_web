@extends('@dashboard._layouts.master')

@section('page_title') Slider @endsection

@section('page_contents')

    <!-- Page Heading -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Sliders ({{ $resources->count() }})
                        </h1>
                        <div class="page-header-subtitle">All Application Required Data</div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <a href="{{ route('slider.create') }}" class="btn btn-sm btn-white">
                            <i class="mr-2 text-primary" data-feather="plus"></i> Add New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="card mb-4">
            <div class="card-header">All Slider</div>
            <div class="card-body">
                <div class="datatable">
                <table class="table table-responsive table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Text 1</th>
                            <th>Text 2</th>
                            <th>Text 3</th>
                            <th>Button 1 text</th>
                            <th>Button 2 text</th>
                            <th>Button 1 link</th>
                            <th>Button 2 link</th>
                            <th>Image</th>
                            <th>Active</th>
                            <th>Featured</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{ getFromJson($resource->text_1 , lang()) }}</td>
                                <td>{{ getFromJson($resource->text_2 , lang()) }}</td>
                                <td>{!! getFromJson($resource->text_3 , lang()) !!}</td>
                                <td>{{ getFromJson($resource->button_1_text , lang()) }}</td>
                                <td>{{ getFromJson($resource->button_2_text , lang()) }}</td>
                                <td>{{ $resource->button_1_link }}</td>
                                <td>{{ $resource->button_2_link }}</td>
                                <td>
                                    <img style="width: 150px;" class="img-fluid" src="{{ url('assets_public/images/slider/'. $resource->image) }}" alt="">
                                </td>
                                <td>
                                    @if($resource->is_active == 1)
                                        <span class="badge badge-success badge-pill">Yes</span>
                                    @else
                                        <span class="badge badge-danger badge-pill">No</span>
                                    @endif
                                </td>
                                <td>
                                    @if($resource->is_featured == 1)
                                        <span class="badge badge-success badge-pill">Yes</span>
                                    @else
                                        <span class="badge badge-danger badge-pill">No</span>
                                    @endif
                                </td>
                                <td>{{ $resource->created_at }}</td>
                                <td>
                                    <a href="{{ route('slider.edit' , [$resource->uuid]) }}" class="btn btn-datatable text-warning btn-icon btn-transparent-dark mr-2"><i data-feather="edit"></i></a>
                                    <a href="{{ route('slider.destroy' , [$resource->uuid]) }}" class="btn btn-datatable text-danger btn-icon btn-transparent-dark confirm-delete"><i data-feather="trash-2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

@endsection
