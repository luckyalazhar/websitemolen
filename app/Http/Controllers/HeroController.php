<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index(Request $request)
    {
    
        if ($request->has('search')) {
            $data = Hero::where('name', 'LIKE', '%' . $request->search.'%')->paginate(5);
        } else {
            $data = Hero::paginate(5);
        }

        return view('index', compact('data'),[
        "title" => "Data Hero" ]);
    }
    public function insert()
    {
        return view('insert',["title" => "Insert"]);
    }
    public function insertdata(Request $request)
    {
        $data = Hero::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('heroesimage', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        toastr('Data Successfully Added');
        return redirect()->route('hero');
    }
    public function edit($id)
    {
        $data = Hero::find($id);
        return view('edit', compact('data'),["title" => "Edit"]);
    }
    public function update(Request $request, $id)
    {
        $data = Hero::find($id);
        $data->update($request->all());
        toastr('Data Successfully Updated');
        return redirect()->route('hero');
    }
    public function delete($id)
    {
        $data = Hero::find($id);
        $data->delete();
        toastr('Data Successfully Deleted');
        return redirect()->route('hero');
    }
}
