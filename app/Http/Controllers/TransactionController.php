<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('transactions.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'products' => 'required|array',
            'quantities' => 'required|array',
        ]);

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'customer_id' => $request->customer_id,
            'total_amount' => 0, // Calculate total amount later
            'date' => now(),
        ]);

        $total_amount = 0;
        foreach ($request->products as $key => $product_id) {
            $product = Product::findOrFail($product_id);
            $quantity = $request->quantities[$key];
            $price = $product->prices()->latest('date')->first()->selling_price; // Get latest selling price

            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'price' => $price,
            ]);

            $total_amount += $quantity * $price;
        }

        $transaction->update(['total_amount' => $total_amount]);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('transactions.edit', compact('transaction', 'products', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Implement update logic here
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        // Implement delete logic here
    }
}
