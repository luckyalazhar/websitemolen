<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student(Request $request)
    {
        if ($request->has('search')) {
            $data = Student::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Student::paginate(5);
        }
        return view('home', compact('data'));
    }

    public function input()
    {
        return view('input');
    }

    public function insert(Request $request)
    {
        $data = Student::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('student')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $data = Student::find($id);
        return view('show', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $data = Student::find($id);
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        $data->update($request->all());

        return redirect()->route('student')->with('success', 'Data Berhasil Diupdate');
    }

    public function delete($id)
    {
        $data = Student::find($id);
        $data->delete();

        return redirect()->route('student')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportpdf()
    {
        $data = Student::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('student-pdf');
        return $pdf->download('data.pdf');
    }
}
