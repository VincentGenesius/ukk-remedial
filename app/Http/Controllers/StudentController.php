<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    private function getStudents()
    {
        $students = json_decode(file_get_contents(storage_path('app/data/students.json')), true);
        $students = collect($students);

        return $students;
    }

    public function create()
    {
        // session()->forget('students');
        $students = $this->getStudents();

        return view('create', [
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => ['required'],
            'name' => ['required'],
            'gender' => ['required'],
            'birth_date' => ['required'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg']
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $photoName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $photoName);
        }

        $newStudent = [
            'nisn' => $request->nisn,
            'name' => $request->name,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'photo' => $photoName
        ];

        session()->push('students', $newStudent);
        return redirect()->route('index');
    }

    public function index()
    {
        $students = collect(session('students', []));

        return view('index', [
            'students' => $students,
        ]);
    }

    public function resetStudents()
    {
        session()->forget('students');
        return redirect()->route('index');
    }
}
