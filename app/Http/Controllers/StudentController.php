<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use Illuminate\Support\Facades\Session;
use App\Exports\StudentsExport;
use Excel;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $students = Student::all();

        return view('admin.student.index', [
            'students' => $students,
        ]);
    }

    public function create(ClassRoom $classroom){

        $this->authorize('create', Student::class);

        return view('admin.student.create', [
            'classroom' => $classroom,
        ]);
    }

    public function store(ClassRoom $classroom){
        
        $data = request()->validate([
            'name' => 'required | string | max:50',
            'dob' => 'nullable|',
            'gender' => 'required |',
            'parent_name' => 'nullable|string|max:50',
            'parent_email' => 'nullable|email|',
            'parent_phone' => 'nullable|digits:10',
            // 'classroom_id' => 'nullable|numeric|exists:class_rooms,id',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên học sinh',
            'name.max' => 'Họ và tên học sinh bao gồm quá nhiều ký tự',

            'gender.required' => 'Vui lòng chọn giới tính học sinh',
            'parent_name.max' => 'Họ và tên phụ huynh bao gồm quá nhiều ký tự',
            'parent_email.email' => 'Địa chỉ email không hợp lệ',
            'parent_phone.digits' => 'Số điện thoại không hợp lệ',

            // 'classroom_id.numeric' => 'ID lớp học phải là số',
            // 'classroom_id.exists' => 'ID lớp học không tồn tại'
            
        ]);

        // Student::create($data);

        $classroom->students()->create($data);

        Session::flash('create', 'Thông tin học sinh đã được tạo thành công');

        return redirect()->route('students.index');
    }

    public function edit(Student $student){

        $this->authorize('update', $student);
        
        return view('admin.student.edit', [
            'student' => $student,
            'subjects' => Subject::all(),
        ]);
    }

    public function update(Student $student){
        $data = request()->validate([
            'name' => 'required | string | max:50 ',
            'dob' => 'nullable|',
            'gender' => 'required |',
            'parent_name' => 'nullable|string|max:50',
            'parent_email' => 'nullable|email|',
            'parent_phone' => 'nullable|numeric',
            'classroom_id' => 'nullable|numeric|exists:class_rooms,id',
        ], [
            'name.required' => 'Vui lòng nhập họ và tên học sinh',
            'name.max' => 'Họ và tên học sinh bao gồm quá nhiều ký tự',

            'gender.required' => 'Vui lòng chọn giới tính học sinh',
            'parent_name.max' => 'Họ và tên phụ huynh bao gồm quá nhiều ký tự',
            'parent_email.email' => 'Địa chỉ email không hợp lệ',
            'parent_phone.digits' => 'Số điện thoại không hợp lệ',

            'classroom_id.numeric' => 'ID lớp học phải là số',
            'classroom_id.exists' => 'ID lớp học không tồn tại'            
        ]);

        $student->update($data);
        
        Session::flash('update', 'Thông tin học sinh đã được cập nhật thành công');

        return redirect()->route('students.index');
    }

    public function destroy(Request $request){

        $student = Student::findOrFail($request->student_id);

        $this->authorize('delete', $student);

        $student->delete();

        Session::flash('destroy', 'Học sinh đã được xóa thành công');

        return back();
    }

    /**
     * Subjects
     */

    public function attach(Student $student){
        $student->subjects()->attach(request('subject'));

        return back();
    }

    public function detach(Student $student){
        $student->subjects()->detach(request('subject'));

        return back();
    }

    /**
     * export excel
     */
    public function exportIntoExcel() {
        return Excel::download(new StudentsExport, "students.xlsx"); 
    } 
}
