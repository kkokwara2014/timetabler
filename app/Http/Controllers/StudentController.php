<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return view('student.student', ['student' => $student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'studname' => 'required',
            'amount' => 'required',
        ]);

        $student = new Student;

        $student->name = $request->studname;
        $student->amount = $request->amount;
        // $student->created_at = date('Y-m-d');
        // $student->updated_at = date('Y-m-d');
        $student->save();

        // return redirect(route('student.create'));
        return back()->with('success','Student Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    public function pdfexport($id)
    {
        $student = Student::find($id);
        $pdf = PDF::loadView('student.pdf', ['student' => $student])->setPaper('a4', 'portrait');
        $filename = $student->name;
        return $pdf->stream($filename . '.pdf');
    }

    public function getAllStudents()
    {
        $allStudents = Student::all();
        return $allStudents;
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_student_info_to_html());
        $filename = 'Student Information';
        return $pdf->stream($filename . '.pdf');
    }

    public function convert_student_info_to_html()
    {
        $student_info = $this->getAllStudents();
        $output = '
        <h2 align="center">Student Information</h2>
        <table width="100%" style="border-collapse:collapse; border:0px;">
            <tr>
            <th style="border:1px solid; padding:12px;" width="10%">#</th>
            <th style="border:1px solid; padding:12px;" width="45%">Name</th>
            <th style="border:1px solid; padding:12px;" width="45%">Amount</th>
            </tr>
        ';
        foreach ($student_info as $studinfo) {
            $output .= '
            <tr>
            <td style="border:1px solid; padding:12px;">' . $studinfo->id . '</td>
            <td style="border:1px solid; padding:12px;">' . $studinfo->name . '</td>
            <td style="border:1px solid; padding:12px;">' . $studinfo->amount . '</td>
            </tr>';
        }
        $output .= '</table>';
        return $output;
    }
}
