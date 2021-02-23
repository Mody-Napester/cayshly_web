@extends('@dashboard._layouts.master')

@section('page_title') Contact @endsection

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
                            Add New Contact
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
                <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Create new contact</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="is_default">Id Default</label>
                                        <select class="form-control @error('is_default') is-invalid @enderror" id="is_default" name="is_default">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>

                                        @error('is_default')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

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

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="address_{{ $lang }}">Address ({{ $lang }})</label>
                                            <input class="form-control @error('address_'.$lang) is-invalid @enderror "
                                                   id="address_{{ $lang }}"
                                                   type="text" name="address_{{ $lang }}"
                                                   placeholder="Enter address_{{ $lang }} .." value="{{ old('address_' . $lang) }}">

                                            @error('address_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror "
                                               id="phone"
                                               type="text" name="phone"
                                               placeholder="Enter phone .." value="{{ old('phone') }}">

                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="mobile">Mobile</label>
                                        <input class="form-control @error('mobile') is-invalid @enderror "
                                               id="mobile"
                                               type="text" name="mobile"
                                               placeholder="Enter mobile .." value="{{ old('mobile') }}">

                                        @error('mobile')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="fax">Fax</label>
                                        <input class="form-control @error('fax') is-invalid @enderror "
                                               id="fax"
                                               type="text" name="fax"
                                               placeholder="Enter fax .." value="{{ old('fax') }}">

                                        @error('fax')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror "
                                               id="email"
                                               type="email" name="email"
                                               placeholder="Enter email .." value="{{ old('email') }}">

                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="working_hours">Working hours</label>
                                        <input class="form-control @error('working_hours') is-invalid @enderror "
                                               id="working_hours"
                                               type="text" name="working_hours"
                                               placeholder="Enter working_hours .." value="{{ old('working_hours') }}">

                                        @error('working_hours')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="map">Map</label>
                                        <input class="form-control @error('map') is-invalid @enderror "
                                               id="map"
                                               type="text" name="map"
                                               placeholder="Enter map .." value="{{ old('map') }}">

                                        @error('map')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="picture">Picture</label>
                                        <input class="form-control @error('picture') is-invalid @enderror" id="picture" type="file" name="picture">

                                        @error('picture')
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
