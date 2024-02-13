<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        return Sale::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'sale_date' => 'nullable|date',
            'vat' => 'boolean',
            'discount' => 'numeric',
        ]);

        $sale = Sale::create($request->all());

        return response()->json($sale, 201);
    }

    public function show(Sale $sale)
    {
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
