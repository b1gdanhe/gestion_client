<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('client')->latest()->paginate(10);
        return view('pages.admin.orders.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::active()->get();
        $products = Product::all();
        return view('pages.admin.orders.create', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'payment_status' => 'required|in:pending,paid,failed',
            'payment_method' => 'nullable|string',
            'subtotal' => 'required|numeric|min:0',
            'tax_amount' => 'required|numeric|min:0',
            'discount_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'shipping_address' => 'nullable|string',
            'billing_address' => 'nullable|string',
        ]);

        // Générer un numéro de commande unique
        $validated['order_number'] = 'CMD-' . date('Ymd') . '-' . strtoupper(uniqid());

        $order = Order::create($validated);

        return redirect()->route('orders.index', $order->id)
            ->with('success', 'Commande créée avec succès');
    }

    public function show(Order $order)
    {
        $order->load(['client', 'items']);
        return view('pages.admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $clients = Client::active()->get();
        return view('pages.admin.orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'payment_status' => 'required|in:pending,paid,failed',
            'payment_method' => 'nullable|string',
            'subtotal' => 'required|numeric|min:0',
            'tax_amount' => 'required|numeric|min:0',
            'discount_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string',
            'shipping_address' => 'nullable|string',
            'billing_address' => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('pages.admin.orders.show', $order->id)
            ->with('success', 'Commande mise à jour avec succès');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('pages.admin.orders.index')
            ->with('success', 'Commande supprimée avec succès');
    }

    public function invoice(Order $order)
    {
        $order->load(['client', 'items']);
        // Ici vous pourriez générer un PDF de la facture
        // return view('pages.admin.orders.invoice', compact('order'));
        // Ou utiliser un package comme laravel-dompdf
    }
}
