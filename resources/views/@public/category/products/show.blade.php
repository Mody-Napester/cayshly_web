@extends('@public._layouts.master')

@section('page_title') {{ getFromJson($category->name, lang()) }} @endsection

@section('page_contents')

@endsection
