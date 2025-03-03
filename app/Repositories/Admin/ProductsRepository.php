<?php


namespace App\Repositories\Admin;

use App\Models\Admin\Product;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductsRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'App\\Models\\Admin\\Product';
    }

    public function allProducts($searchData)
    {
        try {
            return $this->select('products.*', 'categories.name as category', 'colors.color as color')
                ->leftJoin('categories', 'products.category_id', 'categories.id')
                ->leftJoin('colors', 'products.color_id', 'colors.id')
                ->orderBy('updated_at', 'DESC')
                ->get();
        } catch(ModelNotFoundException $e) {
            return null;
        }
    }

    public function findOrNull($id) {
        try {
            $product = Product::select('products.*')
            ->where('id','=',$id)
            ->first();
            return $product;
        } catch(ModelNotFoundException $e) {
            return null;
        }
    }

    public function getNoted()
    {
        return $this->select('products.*', 'categories.name as category', 'colors.color as color')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->leftJoin('colors', 'products.color_id', 'colors.id')
            ->paginate(4);
    }

}
