<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Exports\TeachersExport;
use Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

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
        'phone' => 'nullable|digits:10|unique:teachers,phone',
        ], [
            'user_id.required' => 'Vui lòng nhập ID của người dùng',
            'user_id.exists' => 'ID không tồn tại', 
            'user_id.unique' => 'ID không hợp lệ',
            'user_id.numeric' => 'ID phải là chữ số',
            
            'phone.digits:10' => 'Số điện thoại không hợp lệ',
            'phone.unique' => 'Số điện thoại đã tồn tại'
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
            'phone' => ['nullable', 'digits:10', Rule::unique('teachers', 'phone')->ignore($teacher)],
        ], [
            'phone.digits:10' => 'Số điện thoại không hợp lệ',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);

        $teacher->update($data);

        Session::flash('updated-message', 'Thông tin giáo viên đã được sửa thành công');
        return redirect()->route('teachers.index');
    }

    public function destroy(Request $request){
        $teacher = Teacher::findOrFail($request->teacher_id);
        $teacher->delete();

        Session::flash('destroy-message', 'Giáo viên đã được xóa thành công');
        return back();
    }

    public function exportIntoExcel() {
        return Excel::download(new TeachersExport, "teachers.xlsx"); 
    }
}
