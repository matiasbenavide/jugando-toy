<?php


namespace App\Repositories\Admin;

use App\Models\Admin\Receipt;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReceiptsRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return 'App\\Models\\Admin\\Receipt';
    }

    public function findBySaleIdOrNull($saleId) {
        try {
            $receipt = Receipt::select('receipts.*')
                ->where('sale_id', '=', $saleId)
                ->first();
            return $receipt;
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }

}
