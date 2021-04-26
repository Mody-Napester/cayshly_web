@extends('@dashboard._layouts.master')

@section('page_title') Control Points @endsection

@section('page_contents')
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="book"></i></div>
                            Control Points
                        </h1>
                        <div class="page-header-subtitle">Add Or Remove Points From Users</div>
                    </div>

                    <div class="col-12 col-xl-auto mt-4">

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main page content-->
    <div class="container mt-n10">
        <form action="{{ route('user.points.control.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Control Points</h6>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-col-form-label" for="users">Users</label>
                                <select style="width: 100%;" class="select2 @error('users') is-invalid @enderror" multiple id="users" name="users[]">
                                    @foreach($users as $user)
                                        <option @if(isset($_GET['user']) && $_GET['user'] == $user->id) selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                @error('users')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-col-form-label" for="point_reason">Reason</label>
                                <select style="width: 100%;" class="select2 @error('point_reason') is-invalid @enderror" id="point_reason" name="point_reason">
                                    @foreach($point_reasons as $point_reason)
                                        <option value="{{ $point_reason->id }}">{{ getFromJson($point_reason->name , lang()) }}</option>
                                    @endforeach
                                </select>

                                @error('point_reason')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Amount"/>
                                @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
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

@endsection
