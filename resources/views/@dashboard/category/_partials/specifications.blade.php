<table class="table table-sm table-bordered table-striped">
    @if($has_data)
        @if(count($specifications) > 0)
            @foreach($specifications as $specification)
                <?php
                if(isset($product_id)){
                    $specification_id = $specification->id;
                    $pro_specification = \Illuminate\Support\Facades\DB::table('product_specification')
                        ->where('product_id', $product_id)
                        ->where('specification_id', $specification_id)
                        ->first();
                }
                ?>
                <tr>
                    <td>{{ getFromJson($specification->name , lang()) }}</td>
                    <td>
                        <input name="specification[{{ $specification->uuid }}]" @if(isset($pro_specification)) value="{{ $pro_specification->value }}" @endif  type="text" class="">
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>No Data Available</td>
            </tr>
        @endif
    @else
        <tr>
            <td>No Data Selected</td>
        </tr>
    @endif
</table>
