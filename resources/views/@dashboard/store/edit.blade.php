@extends('@dashboard._layouts.master')

@section('page_title') Store @endsection

@section('head_styles')
    <link rel="stylesheet" media="screen" href="{{ url('assets_dashboard/css/cartzilla.icons.css') }}">
@endsection

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
                            Edit Store "{{ getFromJson($resource->name , lang()) }}"
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
                <form action="{{ route('store.update', $resource->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Update store</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="is_authorized">Is authorized</label>
                                        <select class="form-control @error('is_authorized') is-invalid @enderror" id="is_authorized" name="is_authorized">
                                            <option @if($resource->is_authorized == 1) selected @endif value="1">Yes</option>
                                            <option @if($resource->is_authorized == 0) selected @endif value="0">No</option>
                                        </select>

                                        @error('is_authorized')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

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

                                @foreach(langs("short_name") as $lang)
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

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="details_{{ $lang }}">Details ({{ $lang }})</label>
                                            <textarea class="form-control @error('details_'.$lang) is-invalid @enderror "
                                                      id="details_{{ $lang }}" name="details_{{ $lang }}"
                                                      placeholder="Enter details_{{ $lang }} ..">{{ getFromJson($resource->details , $lang) }}</textarea>

                                            @error('details_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <script>
                                                CKEDITOR.replace( 'details_{{ $lang }}' );
                                            </script>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="phone">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror "
                                               id="phone"
                                               type="text" name="phone"
                                               placeholder="Enter phone .." value="{{ $resource->phone }}">

                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror "
                                               id="email"
                                               type="text" name="email"
                                               placeholder="Enter email .." value="{{ $resource->email }}">

                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="website">Website</label>
                                        <input class="form-control @error('website') is-invalid @enderror "
                                               id="website"
                                               type="text" name="website"
                                               placeholder="Enter website .." value="{{ $resource->website }}">

                                        @error('website')
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="cover">Cover</label>
                                        <input class="form-control @error('cover') is-invalid @enderror" id="cover" type="file" name="cover">

                                        @error('cover')
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

@section('footer_scripts')
    <script !src="">
        $(document).ready(function () {
            $('.font_icons_btn').on('click', function () {
                $('.font_icons_container').slideToggle();
            })
        });
    </script>
@endsection

