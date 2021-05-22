<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index(){

        $students = Student::all();

        return view('admin.student.index', [
            'students' => $students,
        ]);
    }

    public function create(){
        return view('admin.student.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required | string ',
            'dob' => 'nullable|',
            'gender' => 'required |',
            'parent_name' => 'nullable|string|',
            'parent_email' => 'nullable|email|',
            'parent_phone' => 'nullable|numeric',
            'classroom_id' => 'required|numeric|exists:class_rooms,id',
        ]);

        Student::create($data);

        return back();
    }

    public function edit(Student $student){
        
        return view('admin.student.edit', [
            'student' => $student
        ]);
    }

    public function update(Student $student){
        $data = request()->validate([
            'name' => 'required | string ',
            'dob' => 'nullable|',
            'gender' => 'required |',
            'parent_name' => 'nullable|string|',
            'parent_email' => 'nullable|email|',
            'parent_phone' => 'nullable|numeric',
            'classroom_id' => 'nullable|numeric|exists:class_rooms,id',
        ]);

        $student->update($data);

        return redirect()->route('students.index');
    }

    public function destroy(Student $student){
        $student->delete();

        return back();
    }
}
