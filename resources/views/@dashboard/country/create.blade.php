@extends('@dashboard._layouts.master')

@section('page_title') Country @endsection

@section('head_scripts')
    <script src="{{ url('assets_dashboard/vendor/ckeditor/ckeditor.js') }}"></script>
@endsection

@section('page_contents')

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Add New Country
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
                <form action="{{ route('country.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create new country</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="is_active">Is Active</label>
                                        <select class="form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>

                                        @error('is_active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="nicename">Nice name</label>
                                        <input class="form-control @error('nicename') is-invalid @enderror "
                                               id="nicename"
                                               type="text" name="nicename"
                                               placeholder="Enter nicename .." value="{{ old('nicename') }}">

                                        @error('nicename')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="iso">ISO</label>
                                        <input class="form-control @error('iso') is-invalid @enderror "
                                               id="iso"
                                               type="text" name="iso"
                                               placeholder="Enter iso .." value="{{ old('iso') }}">

                                        @error('iso')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="iso3">ISO3</label>
                                        <input class="form-control @error('iso3') is-invalid @enderror "
                                               id="iso3"
                                               type="text" name="iso3"
                                               placeholder="Enter iso3 .." value="{{ old('iso3') }}">

                                        @error('iso3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="numcode">Num code</label>
                                        <input class="form-control @error('numcode') is-invalid @enderror "
                                               id="numcode"
                                               type="text" name="numcode"
                                               placeholder="Enter numcode .." value="{{ old('numcode') }}">

                                        @error('numcode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="phonecode">Phone code</label>
                                        <input class="form-control @error('phonecode') is-invalid @enderror "
                                               id="phonecode"
                                               type="text" name="phonecode"
                                               placeholder="Enter phonecode .." value="{{ old('phonecode') }}">

                                        @error('phonecode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="name_{{ $lang }}">Name ({{ $lang }})</label>
                                            <input class="form-control @error('name_'.$lang) is-invalid @enderror "
                                                   id="name_{{ $lang }}"
                                                   type="text" name="name_{{ $lang }}"
                                                   placeholder="Enter name_{{ $lang }} .." value="{{ old('name_' . $lang) }}">

                                            @error('name_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
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
