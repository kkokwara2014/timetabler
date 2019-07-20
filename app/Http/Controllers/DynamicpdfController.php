<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DynamicpdfController extends Controller
{
    public function index()
    {
        $student_info = $this->get_student_data();
        return view('student_info')->with('student_info', $student_info);
    }

    public function get_student_data()
    {
        $student_info = DB::table('biodata')->limit(10)->get();
        return $student_info;
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_student_info_to_html());
        return $pdf->stream();
    }

    public function convert_student_info_to_html()
    {
        $student_info = $this->get_student_data();
        $output = '
        <h2 align="center">Student Biodata</h2>
        <table width="100%" style="border-collapse:collapse; border:0px;">
            <tr>
            <th style="border:1px solid; padding:12px;" width="20%">Last Name</th>
            <th style="border:1px solid; padding:12px;" width="20%">First Name</th>
            <th style="border:1px solid; padding:12px;" width="30%">Email Address</th>
            <th style="border:1px solid; padding:12px;" width="10%">Phone</th>
            <th style="border:1px solid; padding:12px;" width="10%">Registered</th>
            </tr>
        ';
        foreach ($student_info as $studinfo) {
            $output .= '
            <tr>
            <td style="border:1px solid; padding:12px;">' . $studinfo->lastname . '</td>
            <td style="border:1px solid; padding:12px;">' . $studinfo->firstname . '</td>
            <td style="border:1px solid; padding:12px;">' . $studinfo->email . '</td>
            <td style="border:1px solid; padding:12px;">' . $studinfo->phone . '</td>
            <td style="border:1px solid; padding:12px;">' . $studinfo->created_at . '</td>
            </tr>';
        }
        $output.='</table>';
        return $output;
    }
}
