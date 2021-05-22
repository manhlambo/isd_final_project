<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use Illuminate\Http\Request;
use App\User;
use App\Teacher;
use App\Student;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index', [
            'users' => User::all(),
            'teachers' => Teacher::all(),
            'classrooms' => ClassRoom::all(),
            'students' => Student::all(),
        ]);
    }
}
