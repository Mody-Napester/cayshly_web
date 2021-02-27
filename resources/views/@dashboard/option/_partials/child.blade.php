<table class="table table-sm table-bordered table-striped">
    @if($has_data)
        @foreach($options as $key => $option)
            <tr class="bg-dark text-white">
                <td colspan="2" class="text-center">{{ getFromJson($option->name , lang()) }}</td>
            </tr>
            @if(count($option->child) > 0)
                @foreach($option->child as $child)
                    <tr>
                        <td>{{ getFromJson($child->name , lang()) }}</td>
                        <td>
                            <?php
                            if(isset($product_id)){
                                $option_id = $child->id;
                                $pro_option = \Illuminate\Support\Facades\DB::table('product_option')
                                    ->where('product_id', $product_id)
                                    ->where('option_id', $option_id)
                                    ->first();
                            }
                            ?>
                            <input name="product_options[]" @if(isset($pro_option)) checked @endif type="checkbox" value="{{ $child->uuid }}" class="">
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2">No Data Available</td>
                </tr>
            @endif
        @endforeach
    @else
        <tr>
            <td>No Data Selected</td>
        </tr>
    @endif
</table>
