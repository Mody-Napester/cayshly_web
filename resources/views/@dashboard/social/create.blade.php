@extends('@dashboard._layouts.master')

@section('page_title') Social @endsection

@section('page_contents')

    <!-- Page Heading -->
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Add New Social
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('social.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create new social account</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="provider_id">Provider</label>
                                        <select class="form-control @error('provider_id') is-invalid @enderror" id="provider_id" name="provider_id">
                                            @foreach($providers as $provider)
                                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('provider_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="name">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror "
                                               id="name" type="text" name="name"
                                               placeholder="Enter name .." value="{{ old('name') }}">

                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="link">Link</label>
                                        <input class="form-control @error('link') is-invalid @enderror "
                                               id="link" type="text" name="link"
                                               placeholder="Enter link .." value="{{ old('link') }}">

                                        @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-save"></i> Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
