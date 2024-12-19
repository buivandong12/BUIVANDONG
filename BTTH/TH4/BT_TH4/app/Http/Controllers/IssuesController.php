<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Issue;

class IssuesController extends Controller
{
    public function index()
    {
        $data = Issue::with('computer')->get();
        return view('Issue.index', compact('data'));
    }

    public function create()
    {
        $data = Computer::all();
        return view('Issue.create', compact('data'));
    }

    public function store(Request $request)
    {
        //dd($request);
        // Validate dữ liệu
        $validatedData = $request->validate([
            'computer_id' => 'required',
            'reporter_by' => 'required',
            'reporter_date' => 'required',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ], [
            'computer_id.required' => 'Vui lòng chọn tên.',
            'reporter_by.required' => 'Vui lòng nhập số lượng.',
            'reporter_date.required' => 'Vui lòng chọn ngày.',
            'description.required' => 'Vui lòng mô tảtả.',
            'urgency.required' => 'Vui lòng nhập urgency.',
            'status.required' => 'Vui lòng nhập status.',
        ]);
        Issue::create([
            'computer_id' => $request->computer_id,
            'reporter_by' => $request->reporter_by,
            'reporter_date' => $request->reporter_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
        return redirect()->route('Issue.index')->with('success', 'Thêm
bài viết thành công!')
        ;
    }

    public function edit($id)
    {
        $Issue = Issue::with('computer')->findOrFail($id);
        $Computer = Computer::all();
        return view('Issue.edit', compact('Issue', 'Computer'));
    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $validatedData = $request->validate([
            'computer_id' => 'required',
            'reporter_by' => 'required',
            'reporter_date' => 'required',
            'description' => 'required',
            'urgency' => 'required',
            'status' => 'required',
        ], [
            'computer_id.required' => 'Vui lòng chọn tên.',
            'reporter_by.required' => 'Vui lòng nhập số lượng.',
            'reporter_date.required' => 'Vui lòng chọn ngày.',
            'description.required' => 'Vui lòng mô tảtả.',
            'urgency.required' => 'Vui lòng nhập urgency.',
            'status.required' => 'Vui lòng nhập status.',
        ]);
        $Issue = Issue::find($id);

        $Issue->update([
            'computer_id' => $request->computer_id,
            'reporter_by' => $request->reporter_by,
            'reporter_date' => $request->reporter_date,
            'description' => $request->description,
            'urgency' => $request->urgency,
            'status' => $request->status,
        ]);
        return redirect()->route('Issue.index')->with('success', 'Cập
nhật thành công.');
    }

    public function destroy($id)
    {
        $Issue = Issue::find($id);
        $Issue->delete();
        return redirect()->route('Issue.index')->with('success', 'Sản
phẩm đã được xóa.');
    }
}
