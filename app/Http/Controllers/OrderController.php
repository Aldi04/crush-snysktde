<?php
namespace App\Http\Controllers;

use App\Order;
use App\Payment_method;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::latest()->paginate(5);

        return view('admin.order.index', compact('order'))
            ->with('i', (request()
            ->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = Payment_method::all();

        return view('admin.order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = (string) Str::uuid();

        $request->validate([
            'user_id' => 'required', 
            'invoice' => 'required', 
            'total_price' => 'required', 
            'status' => 'required', 
            'payment_method_id' => 'required', 
        ]);

        $order = new Order;

        $order->user_id = $request->user_id;
        $order->total_price = $request->total_price;
        $order->status = $request->status;
        $order->payment_methdod_id = $request->payment_methdod_id;

        $order->save();

        Order::create($request->all());

        return redirect()
            ->route('order.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required', 
            'invoice' => 'required', 
            'total_price' => 'required', 
            'status' => 'required', 
            'payment_method_id' => 'required', 
        ]);
        
        $order->update($request->all());

        return redirect()
            ->route('order.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('order.index')
            ->with('success', 'Order deleted successfully');
    }
}