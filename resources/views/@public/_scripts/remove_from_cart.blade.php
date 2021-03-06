<script>
    $(document).ready(function () {
        $(document).on('click', '.remove_from_cart', function () {
            var that = $(this);
            var item = $(this).attr('data-item');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: "{{ route('public.cart.remove') }}",
                type: 'post',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    item : item
                },
                beforeSend : function(){
                    addLoader();
                },
                success: function(data){

                    $('.cart-toast').find('.toast-title').text(data.message.title);
                    $('.cart-toast').find('.cart-title-color').removeClass('bg-danger');
                    $('.cart-toast').find('.cart-title-color').removeClass('bg-success');
                    $('.cart-toast').find('.cart-title-color').addClass('bg-' + data.message.type);
                    $('.cart-toast').find('.toast-body').text(data.message.text);
                    $('.cart-count').text(data.carts);
                    $('.cart-price').text(data.cart_price_sum);

                    if(that.attr('data-refresh') == 'true'){
                        setTimeout(function () {
                            location.reload();
                        }, 1000);
                    }else{
                        if(data.message.type == 'success'){
                            that.parents('.btn-cart-status').html(data.btn_view);
                        }
                    }

                    $('#cart-toast').toast('show');
                    removeLoader();
                },
                error: function(data){
                    alert('{{ trans('messages.sorry_error_exists') }}')
                    removeLoader();
                }
            });

        });
    });
</script>
