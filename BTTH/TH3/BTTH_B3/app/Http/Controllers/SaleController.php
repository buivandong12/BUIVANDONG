<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sale::with('medicine')->paginate(5);
        //paginate để phn trang có bao nhiêu bảng ghi
        return view('sale.index', compact('data'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = Medicine::all();
        return view('sale.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
            'date' => 'required|after_or_equal:today',
            'phone' => 'required',
        ], [
            'name.required' => 'Vui lòng chọn tên.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải ít nhất là 1.',
            'date.required' => 'Vui lòng chọn ngày.',
            'date.after_or_equal' => 'Ngày phải từ hôm nay trở đi.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
        ]);
        $medicineName = Medicine::where(
            'name',
            $request->name
        )->first();
        if ($medicineName) {
            Sale::create([
                'medicine_id' => $medicineName->id,
                'quantity' => $request->quantity,
                'sale_date' => $request->date,
                'customer_phone' => $request->phone
            ]);
            session()->flash('success', 'Thêm thành công!');
        }
        return redirect()->route('sale.index')->with('success', 'Thêm
        bài viết thành công!')
        ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $sale_id)
    {
        $sale = Sale::with('medicine')->findOrFail($sale_id);
        $medicines = Medicine::all();
        return view('sale.edit', compact('sale', 'medicines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $sale_id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer|min:1',
            'date' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => 'Vui lòng chọn tên.',
            'quantity.required' => 'Vui lòng nhập số lượng.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
            'quantity.min' => 'Số lượng phải ít nhất là 1.',
            'date.required' => 'Vui lòng chọn ngày.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
        ]);
        $sale = Sale::find($sale_id);
        $medicineName = Medicine::where(
            'name',
            $request->name
        )->first();
        $sale->update([
            'medicine_id' => $medicineName->id,
            'quantity' => $request->quantity,
            'sale_date' => $request->date,
            'customer_phone' => $request->phone
        ]);
        return redirect()->route('sale.index')->with('success', 'Cập
nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sale_id)
    {
        $sale = Sale::find($sale_id);
        $sale->delete();
        return redirect()->route('sale.index')->with('success', 'Sản
phẩm đã được xóa.');
    }
}
