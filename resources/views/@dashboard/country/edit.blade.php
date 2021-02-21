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
                            Edit Country "{{ getFromJson($resource->name , lang()) }}"
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
                <form action="{{ route('country.update', $resource->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update country</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                @foreach(config('vars.langs') as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="name_{{ $lang }}">Name ({{ $lang }})</label>
                                            <input class="form-control @error('name_'.$lang) is-invalid @enderror "
                                                   id="name_{{ $lang }}"
                                                   type="text" name="name_{{ $lang }}"
                                                   placeholder="Enter name_{{ $lang }} .." value="{{ getFromJson($resource->name , $lang) }}">

                                            @error('name_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="is_active">Is Active</label>
                                        <select class="form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active">
                                            <option @if($resource->is_active == 1) selected @endif value="1">Yes</option>
                                            <option @if($resource->is_active == 0) selected @endif value="0">No</option>
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
                                               placeholder="Enter nicename .." value="{{ $resource->nicename }}">

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
                                               placeholder="Enter iso .." value="{{ $resource->iso }}">

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
                                               placeholder="Enter iso3 .." value="{{ $resource->iso3 }}">

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
                                               placeholder="Enter numcode .." value="{{ $resource->numcode }}">

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
                                               placeholder="Enter phonecode .." value="{{ $resource->phonecode }}">

                                        @error('phonecode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-save"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

