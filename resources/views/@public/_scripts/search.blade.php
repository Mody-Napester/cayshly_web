<script>
    $(document).ready(function () {
        $(document).on('click', '.search-products-d-btn', function () {
            var that = $(this);
            var item = $('.search-products-d-input').val();
            addLoader();
            window.location.href = "{{ url('search') }}/" + item;
        });

        $(document).on('click', '.search-products-m-btn', function () {
            var that = $(this);
            var item = $('.search-products-m-input').val();
            addLoader();
            window.location.href = "{{ url('search') }}/" + item;
        });
    });
</script>
