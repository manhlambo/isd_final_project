<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use App\Exports\TeachersExport;
use Excel;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;

class TeacherController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){

        $teachers = Teacher::all();
        
        return view('admin.teacher.index',[
            'teachers' => $teachers,
    ]);
    }

    public function create(User $user){

        $this->authorize('create', Teacher::class);

        return view('admin.teacher.create', [
            'user' => $user,
        ]);
    }

    public function store(User $user){

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
            'user_id.unique' => $user->name.' đã là giáo viên',
            'user_id.numeric' => 'ID phải là chữ số',
            
            'phone.digits' => 'Số điện thoại hợp lệ bao gồm 10 số',
            'phone.unique' => 'Số điện thoại đã tồn tại'
        ]);

        $user->teacher()->create($data);
    
        Session::flash('create', 'Giáo viên được thêm thành công');
        
        return redirect()->route('teachers.index');
    }

    public function edit(Teacher $teacher){
        
        $this->authorize('update', $teacher);

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
            'phone.digits' => 'Số điện thoại không hợp lệ',
            'phone.unique' => 'Số điện thoại đã tồn tại',
        ]);

        $teacher->update($data);

        Session::flash('update', 'Thông tin giáo viên được sửa thành công');
        return redirect()->route('teachers.index');
    }

    public function destroy(Request $request){

        $teacher = Teacher::findOrFail($request->teacher_id);

        $this->authorize('delete', $teacher);
        
        $teacher->delete();

        Session::flash('destroy', 'Giáo viên đã được xóa thành công');
        return back();
    }

    public function exportIntoExcel() {
        return Excel::download(new TeachersExport, "teachers.xlsx"); 
    }
}
