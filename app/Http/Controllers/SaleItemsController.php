<?php

namespace App\Http\Controllers;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleItemsController extends Controller
{
    public function index()
    {
        return SaleItem::with('product', 'sale')->get();
    }

    public function show(SaleItem $saleItem)
    {
        return $saleItem;
    }

    public function update(Request $request, SaleItem $saleItem)
    {
        $request->validate([
            'product_id' => 'required|exists:tbl_products,product_id',
            'sale_id' => 'required|exists:tbl_sales,sale_id',
            'quantity' => 'required|integer',
        ]);

        $saleItem->update($request->all());

        return response()->json($saleItem, 200);
    }

    public function destroy(SaleItem $saleItem)
    {
        $saleItem->delete();

        return response()->json(null, 204);
    }
}
