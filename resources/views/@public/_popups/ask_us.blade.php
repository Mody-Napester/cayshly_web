<div style="direction: rtl;text-align: right" class="modal fade" id="ask_us" tabindex="-1" role="dialog" aria-labelledby="askUSModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('public.store') }}" class="ask_us_form" method="post">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="askUSModalLabel">{{ trans('master.Contact_us') }}</h5>
                    {{--                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--                            <span aria-hidden="true">&times;</span>--}}
                    {{--                        </button>--}}
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input required type="email" class="form-control" name="email" id="email" placeholder="{{ trans('master.email') }}">
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control" name="phone" id="phone" placeholder="{{ trans('master.phone') }}">
                    </div>
                    <div class="form-group">
                        <textarea required class="form-control" name="message" id="message" placeholder="{{ trans('master.message') }}"></textarea>
                    </div>

                    <div class="g-recaptcha" data-sitekey="6LcsgXcUAAAAAGZc1bJG-FHmNMnPr6WfdWQCDy_P"></div>

                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">{{ trans('master.Save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
