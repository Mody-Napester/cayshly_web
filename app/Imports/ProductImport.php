<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{
    public $data;

    public function  __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        $row[0] = name en
//        $row[1] = name ar
//        $row[2] = details en
//        $row[3] = details ar
//        $row[4] = price
//        $row[5] = code
//        $row[6] = warranty

        $nameArray = [
            'en' => $row[0],
            'ar' => $row[1],
        ];
        $name = json_encode($nameArray);

        $detailsArray = [
            'en' => $row[2],
            'ar' => $row[3],
        ];
        $details = json_encode($detailsArray);

        // Check if duplicated
        $duplicated = Product::where(function($query) use ($row, $name){
            $query->where('slug', Str::slug($row[0], '_'));
        })->first();

        if (is_null($duplicated)) {
            $product = Product::create([
                'brand_id' => $this->data['brand_id'],
                'store_id' => $this->data['store_id'],
                'slug' => Str::slug($row[0], '_'),
                'name' => $name,
                'details' => $details,
                'picture' => '',
                'price' => $row[4],
                'code' => $row[5],
                'points' => pointify($row[4]),
                'discount_type' => 1,
                'discount_unit' => null,
                'lookup_condition_id' => $this->data['lookup_condition_id'],
                'warranty' => $row[6],
                'video' => '',
                'is_active' => 1,
                'created_by' => auth()->user()->id,
            ]);

//            dd($product);

            foreach ($this->data['category'] as $category){
                $product->categories()->attach(Category::getOneBy('uuid', $category)->id);
            }

            return $product;
        }
    }
}
