<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;



class TeacherController extends Controller
{
    public function index(){

        $teachers = Teacher::all();
        
        return view('admin.teacher.index',[
            'teachers' => $teachers,
    ]);
    }

    public function create(){
        return view('admin.teacher.create');
    }

    public function store(){
        $data = request()->validate([

            /**
             * bắt buộc, ko trùng trong bảng teacher
             * là chữ số, tồn tại trong bảng users
             */
            'user_id' => 'required|unique:teachers,user_id|numeric|exists:users,id' ,
            'dob' => 'nullable|date',
            'phone' => 'nullable|numeric|unique:teachers,phone',
        ]);

        Teacher::create($data);
    
        Session::flash('message', 'Giáo viên đã được thêm thành công');
        return redirect()->route('teachers.index');
    }

    public function edit(Teacher $teacher){
        return view('admin.teacher.edit', ['teacher' => $teacher]);
    }

    public function update(Teacher $teacher){
        $data = request()->validate([
            'dob' => 'nullable|date',

            /**
             * nullable, phải là số
             * không trùng lặp và bỏ qua số đth của teacher cần update
             */
            'phone' => ['nullable', 'numeric', Rule::unique('teachers', 'phone')->ignore($teacher)],
        ]);

        $teacher->update($data);

        Session::flash('updated-message', 'Thông tin giáo viên đã được sửa thành công');
        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher){
        $teacher->delete();

        Session::flash('destroy-message', 'Giáo viên đã được xóa thành công');
        return back();
    }
}
