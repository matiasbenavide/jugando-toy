<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\SalesRepository;
use App\Repositories\Admin\CombosRepository;
use App\Repositories\Admin\ProductsRepository;
use App\Repositories\Admin\ReceiptsRepository;
use App\Repositories\Admin\ShippingOptionsRepository;

class SalesController extends Controller
{
    /**
     * @var SalesRepository
     */
    protected $salesRepository;

    /**
     * @var ShippingOptionsRepository
     */
    protected $shippingOptionsRepository;

    /**
     * @var ReceiptsRepository
     */
    protected $receiptsRepository;

    /**
     * @var ProductsRepository
     */
    protected $productsRepository;

    /**
     * @var CombosRepository
     */
    protected $combosRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        SalesRepository $salesRepository,
        ShippingOptionsRepository $shippingOptionsRepository,
        ProductsRepository $productsRepository,
        ReceiptsRepository $receiptsRepository,
        CombosRepository $combosRepository
    )
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
        $this->salesRepository = $salesRepository;
        $this->shippingOptionsRepository = $shippingOptionsRepository;
        $this->productsRepository = $productsRepository;
        $this->receiptsRepository = $receiptsRepository;
        $this->combosRepository = $combosRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showSales()
    {
        $task = 'sales';

        $sales = $this->salesRepository->getSales();
        $allSales = $this->salesRepository->all();
        $receipts = $this->receiptsRepository->all();

        $productsData = [];
        $receiptData = null;

        foreach ($allSales as $sale) {

            foreach (json_decode($sale->products) as $product) {
                if ($product->product_category_id == Category::INDIVIDUAL) {
                    $productsData[] = $this->productsRepository->find($product->product_id);
                }
                else
                {
                    $productsData[] = $this->combosRepository->find($product->product_id);
                }
            }

            $sale->products_data = $productsData;
            $productsData = [];

            foreach ($receipts as $receipt) {
                if ($sale->id == $receipt->sale_id) {
                    $receiptData = $this->receiptsRepository->findBySaleIdOrNull($sale->id);
                }
            }

            $sale->receipt_id = $receiptData->id;
            $sale->receipt_name = $receiptData->file_name;
            $receiptData = null;
        }

        return view('pages.admin.sales')->with([
            'task' => $task,
            'sales' => $sales,
            'allSales' => $allSales,
        ]);
    }

    public function downloadSaleReceipt(Request $request)
    {
        $file = $this->receiptsRepository->find($request->receiptId);

        if (!$file) {
            return redirect()->back()->with('error', 'No se pudo encontrar el archivo: ' . $request->receiptNameInput);
        }

        if (Str::endsWith($file->file_name, '.pdf')) {
            return response($file->file)
                ->header('Cache-Control', 'no-cache private')
                ->header('Content-Description', 'File Transfer')
                ->header('Content-Type', 'application/pdf')
                ->header('Content-length', strlen($file->file))
                ->header('Content-Disposition', 'inline; filename="' . $file->file_name . '"')
                ->header('Content-Transfer-Encoding', 'binary');
        }
        return response($file->file)
            ->header('Cache-Control', 'no-cache private')
            ->header('Content-Description', 'File Transfer')
            ->header('Content-Type', 'application/octet-stream')
            ->header('Content-length', strlen($file->file))
            ->header('Content-Disposition', 'attachment; filename="' . $file->file_name . '"')
            ->header('Content-Transfer-Encoding', 'binary');
    }
}
