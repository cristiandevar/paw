<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select("id", "name", "price","description","category_id","seller_id","active","created_at","updated_at")->get();
    }
    /**
     * Write code on Method
    *
    * @return response()
    */
    public function headings(): array
    {
        return ["Id", "Name", "Price","Description","Category Id","Seller Id","Active","Created at","Updated at"];
    }
}
