<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClassRoom;
use Illuminate\Support\Facades\Session;


class ClassRoomController extends Controller
{
    public function index(){

        $classrooms = ClassRoom::all();
        
        return view('admin.classroom.index', [
            'classrooms' => $classrooms,
        ]);
    }

    public function create(){
        return view('admin.classroom.create');
    }

    public function store(){
        $data = request()->validate([
            'grade' => 'required',
            'name' => 'required',
            'teacher_id' => 'nullable | numeric | exists:teachers,id',
        ], [
            'grade.required' => 'Vui lòng điền tên khối học',
            'name.required' => 'Vui lòng điền tên lớp học',
            'teacher_id.numeric' => 'ID giáo viên phải là số',
            'teacher_id.exists' => 'ID giáo viên không tồn tại',  
        ]);

        ClassRoom::create($data);

        Session::flash('message', 'Lớp học đã được thêm thành công');

        return redirect()->route('classrooms.index');

    }

    public function edit(ClassRoom $classroom){
        return view('admin.classroom.edit', [
            'classroom' => $classroom,
        ]);
    }

    public function update(ClassRoom $classroom){
        $data = request()->validate([
            'grade' => 'required',
            'name' => 'required',
            'teacher_id' => 'nullable|numeric|exists:teachers,id',
        ], [

            'grade.required' => 'Vui lòng điền tên khối học',
            'name.required' => 'Vui lòng điền tên lớp học',
            'teacher_id.numeric' => 'ID giáo viên phải là số',
            'teacher_id.exists' => 'ID giáo viên không tồn tại',
        ]);

        $classroom->update($data);

        Session::flash('updated-message', 'Thông tin lớp học đã được sửa thành công');
        return redirect()->route('classrooms.index');
    }

    public function destroy(ClassRoom $classroom){
        $classroom->delete();

        Session::flash('destroy-message', 'Lớp học đã được xóa thành công');
        return back();
    }
}
