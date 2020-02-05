<?php
namespace App\Http\Controllers;

use App\Payment_method;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_method = Payment_method::latest()->paginate(5);

        return view('admin.payment_method.index', compact('payment_method'))
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
        return view('admin.payment_method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 
            'norek' => 'required', 
            'keterangan' => 'required', 
            'status' => 'required', 
        ]);

        Payment_method::create($request->all());

        return redirect()
            ->route('payment_method.index')
            ->with('success', 'Payment Method created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function show(Payment_method $payment_method)
    {
        return view('admin.payment_method.show', compact('payment_method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment_method $payment_method)
    {
        return view('admin.payment_method.edit', compact('payment_method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment_method $payment_method)
    {
        $request->validate([
            'name' => 'required', 
            'norek' => 'required', 
            'keterangan' => 'required', 
            'status' => 'required', 
        ]);

        $payment_method->update($request->all());

        return redirect()
            ->route('payment_method.index')
            ->with('success', 'Payment Method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment_method  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment_method $payment_method)
    {
        $payment_method->delete();

        return redirect()
            ->route('payment_method.index')
            ->with('success', 'Payment Method deleted successfully');
    }
}

