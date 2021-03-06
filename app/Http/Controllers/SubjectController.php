<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;



class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $subjects = Subject::all();

        return view('admin.subject.index', [
            'subjects' => $subjects,
        ]);
    }

    public function store(){

        $this->authorize('create', Subject::class);

        $data = request()->validate([
            'name' => 'required|string|max:25|unique:subjects,name',
            'assign' => 'nullable|string|max:50|regex:/^([^0-9]*)$/',
        ], [
            'name.required' => 'Vui lòng điền tên môn học',
            'name.unique' => 'Môn học đã tồn tại',
            'name.max' => 'Tên môn học quá ký tự cho phép',

            'assign.max' => 'Tên giảng viên quá ký tự cho phép',
            'assign.regex' => 'Tên giảng viên không hợp lệ'
        ]);

        Subject::create($data);

        Session::flash('create', 'Tạo môn học thành công');

        return back();
    }

    public function edit(Subject $subject){

        $this->authorize('update', $subject);
        
        return view('admin.subject.edit', [
            'subject' => $subject
        ]);
    }

    public function update(Subject $subject){

        $data = request()->validate([
            /**
             * không trùng lặp và bỏ qua tên môn cần update
             */
            'name' => ['required', 'string', 'max:25', Rule::unique('subjects', 'name')->ignore($subject)],
            'assign' => 'nullable | string | max:50|regex:/^([^0-9]*)$/',
        ], [
            'name.required' => 'Vui lòng điền tên môn học',
            'name.unique' => 'Môn học đã tồn tại',
            'name.max' => 'Tên môn học quá ký tự cho phép',

            'assign.max' => 'Tên giảng viên quá ký tự cho phép',
            'assign.regex' => 'Tên giảng viên không hợp lệ'
        ]);

        $subject->update($data);

        Session::flash('update', 'Thông tin môn học được sửa thành công');

        return redirect()->route('subjects.index');
    }

    public function destroy(Request $request){

        $subject = Subject::findOrFail($request->subject_id);

        $this->authorize('delete', $subject);

        $subject->delete();

        Session::flash('destroy', 'Môn học đã được xóa thành công');

        return back();
    }
}
