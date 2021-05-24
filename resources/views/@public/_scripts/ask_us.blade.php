<script>
    $(document).ready(function () {
        $('.ask_us_form').on('submit', function (e) {
            e.preventDefault();

            var that = $(this);
            var url = that.attr('action');
            var method = 'post';

            console.log('dsfdsf');

            $.ajax({
                type: method,
                url: url,
                data: that.serialize(),
                beforeSend : function(){
                    addLoader();
                },
                success: function (data) {
                    console.log(data);

                    $('.cart-toast').find('.toast-title').text(data.message.title);
                    $('.cart-toast').find('.cart-title-color').removeClass('bg-danger');
                    $('.cart-toast').find('.cart-title-color').removeClass('bg-success');
                    $('.cart-toast').find('.cart-title-color').addClass('bg-' + data.message.type);
                    $('.cart-toast').find('.toast-body').text(data.message.text);
                    $('#cart-toast').toast('show');

                    $('#ask_us').modal('toggle');
                    removeLoader();
                },
                error: function(data){
                    alert('{{ trans('messages.sorry_error_exists') }}')
                    $('#ask_us').modal('toggle');
                    removeLoader();
                }
            });

        });
    });
</script>
