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
                            Edit Slider
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
                <form action="{{ route('slider.update', $resource->uuid) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit '{{ getFromJson($resource->text_1 , lang()) }}' slider</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="text_1_{{ $lang }}">Text 1 ({{ $lang }})</label>
                                            <input class="form-control @error('text_1_'.$lang) is-invalid @enderror "
                                                   id="text_1_{{ $lang }}"
                                                   type="text" name="text_1_{{ $lang }}"
                                                   placeholder="Enter text 1 {{ $lang }} .." value="{{ getFromJson($resource->text_1 , $lang) }}">

                                            @error('text_1_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="text_2_{{ $lang }}">Text 2 ({{ $lang }})</label>
                                            <input class="form-control @error('text_2_'.$lang) is-invalid @enderror "
                                                   id="text_2_{{ $lang }}"
                                                   type="text" name="text_2_{{ $lang }}"
                                                   placeholder="Enter text 2 {{ $lang }} .." value="{{ getFromJson($resource->text_2 , $lang) }}">

                                            @error('text_2_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="text_3_{{ $lang }}">Text 3 ({{ $lang }})</label>
                                            <textarea class="form-control @error('text_3_'.$lang) is-invalid @enderror "
                                                      id="text_3_{{ $lang }}" name="text_3_{{ $lang }}"
                                                      placeholder="Enter text 3 {{ $lang }} ..">{{ getFromJson($resource->text_3 , $lang) }}</textarea>

                                            @error('text_3_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <script>
                                                CKEDITOR.replace( 'text_3_{{ $lang }}' );
                                            </script>
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="button_1_text_{{ $lang }}">Button 1 Text ({{ $lang }})</label>
                                            <input class="form-control @error('button_1_text_'.$lang) is-invalid @enderror "
                                                   id="button_1_text_{{ $lang }}"
                                                   type="text" name="button_1_text_{{ $lang }}"
                                                   placeholder="Enter button 1 text {{ $lang }} .." value="{{ getFromJson($resource->button_1_text , $lang) }}">

                                            @error('button_1_text_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                @foreach(langs("short_name") as $lang)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-col-form-label" for="button_2_text_{{ $lang }}">Button 2 Text ({{ $lang }})</label>
                                            <input class="form-control @error('button_2_text_'.$lang) is-invalid @enderror "
                                                   id="button_2_text_{{ $lang }}"
                                                   type="text" name="button_2_text_{{ $lang }}"
                                                   placeholder="Enter button 2 text {{ $lang }} .." value="{{ getFromJson($resource->button_2_text , $lang) }}">

                                            @error('button_2_text_'.$lang)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="button_1_link">Button 1 link</label>
                                        <input class="form-control @error('button_1_link') is-invalid @enderror "
                                               id="button_1_link" type="text" name="button_1_link"
                                               placeholder="Enter button 1 link .." value="{{ $resource->button_1_link }}">

                                        @error('button_1_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="button_2_link">Button 2 link</label>
                                        <input class="form-control @error('button_2_link') is-invalid @enderror "
                                               id="button_2_link" type="text" name="button_2_link"
                                               placeholder="Enter button 2 link .." value="{{ $resource->button_2_link }}">

                                        @error('button_2_link')
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="is_featured">Is Featured</label>
                                        <select class="form-control @error('is_featured') is-invalid @enderror" id="is_featured" name="is_featured">
                                            <option @if($resource->is_featured == 1) selected @endif value="1">Yes</option>
                                            <option @if($resource->is_featured == 0) selected @endif value="0">No</option>
                                        </select>

                                        @error('is_featured')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-col-form-label" for="image">Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image">

                                        @error('image')
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
