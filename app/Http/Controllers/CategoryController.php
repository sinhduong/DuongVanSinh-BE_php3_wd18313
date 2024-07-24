<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Hiển thị danh sách danh mục
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
    }

    // Hiển thị form tạo mới danh mục
    public function create()
    {
        return view('category.create');
    }

    // Lưu danh mục mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Tạo mới danh mục
        Category::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được thêm mới thành công.');
    }

    // Hiển thị form chỉnh sửa danh mục
    public function edit($id)
    {
       
    }

    // Cập nhật danh mục trong cơ sở dữ liệu
    public function update(Request $request, $id)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Lấy danh mục cần cập nhật
        $category = Category::findOrFail($id);

        // Cập nhật thông tin danh mục
        $category->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    // Xóa danh mục khỏi cơ sở dữ liệu
    public function destroy($id)
    {
        // Lấy danh mục cần xóa
        $category = Category::findOrFail($id);

        // Xóa danh mục
        $category->delete();

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được xóa thành công.');
    }
}
