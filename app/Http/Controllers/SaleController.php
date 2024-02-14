<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
      // Eager load the 'items' relationship
      $sales = Sale::with('saleItems')->get();

      return $sales;
    }

    public function store(Request $request)
    {
        $request->validate([
            'vat' => 'boolean',
            'discount' => 'numeric',
            'items' => 'array',
            'items.*.product_id' => 'required|exists:tbl_products,product_id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);
        
        $sale = new Sale();
        $sale->vat = $request->input('vat');
        $sale->discount = $request->input('discount');
        $sale->save();
        
        foreach ($request->input('items', []) as $item) {
            SaleItem::create([
                'sale_id' => $sale->sale_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }
    
        return response()->json([
            'message' => 'Sale and items added successfully.',
            'sale' => $sale,
        ], 201);
    }
    
    public function show(Sale $sale)
    {
        // Eager load the 'items' relationship
        $sale = $sale->load('saleItems');
    
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
