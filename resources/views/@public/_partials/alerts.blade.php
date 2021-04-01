<!-- Alert -->
<div class="float-alert">
    @if(session()->has('message'))
        <div class="alert alert-{{ session('message')['type'] }} alert-dismissible alert-with-icon fade show" role="alert">
            <div class="alert-icon-box">
                <i class="alert-icon czi-bell"></i>
            </div>

            {{ session('message')['text'] }}
{{--            <a href="#" class="alert-link">an example link</a>--}}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible alert-with-icon fade show" role="alert">
                <div class="alert-icon-box">
                    <i class="alert-icon czi-bell"></i>
                </div>

                {{ $error }}
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endforeach
    @endif
</div>
