<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // Eager load the 'saleItems' and 'product' relationships
        $sales = Sale::with(['saleItems', 'saleItems.product'])->orderBy('created_at', 'desc')->get();

        return $sales;
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_date' => 'nullable|date',
            'vat' => 'boolean',
            'discount' => 'nullable|numeric',
            'items' => 'array',
            'items.*.product_id' => 'required|exists:tbl_products,product_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $sale = new Sale();

        $sale->vat = $request->input('vat');

        // Check if 'sale_date' is provided in the request
        if ($request->has('sale_date')) {
            $sale->sale_date = $request->input('sale_date');
        }

        $sale->discount = $request->input('discount');

        $sale->save();

        $sub_total = 0;
        $products = [];
        foreach ($request->input('items', []) as $item) {
            $saleItem = SaleItem::create([
                'sale_id' => $sale->sale_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);

            // Assuming the product price is available
            $sub_total += $saleItem->product->price * $item['quantity'];

            // Add the product data to the products array
            $products[] = $saleItem->product;
        }

        $vat = 0;
        if ($sale->vat) {
            // Get the VAT rate from the configuration
            $vat_rate = config('constants.vat_rate');
            $vat = $sub_total * ($vat_rate / 100);
        }
        $totalAfterDiscount = $sub_total - $sale->discount;

        $total = $totalAfterDiscount + $vat;

        return response()->json([
            'message' => 'Sale and items added successfully.',
            'sale' => $sale,
            'products' => $products,
            'sub_total' => $sub_total,
            'vat' => $vat,
            'total_after_discount' => $totalAfterDiscount,
            'total' => $total,
        ], 201);
    }

    
    
    public function show(Sale $sale)
    {
        // Eager load the 'items' relationship
        $sale = $sale->load('saleItems', 'saleItems.product');
    
        return $sale;
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'sale_date' => 'nullable|date',
            'vat' => 'boolean',
            'discount' => 'numeric',
        ]);

        $sale->update($request->all());

        return response()->json($sale, 200);
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return response()->json(null, 204);
    }
}
