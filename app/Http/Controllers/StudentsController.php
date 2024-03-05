<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.data')->with(['students'=> Students::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    // menampilkan dta post ke tabel
    public function store(StoreStudentsRequest $request)
    {
        $validate = $request->validated();

        $students = new Students;
        $students->idstudents =$request->txtid;
        $students->fullname =$request->txtname;
        $students->gender =$request->txtgender;
        $students->address =$request->txtaddress;
        $students->emailaddress =$request->txtemail;
        $students->phone =$request->txtphone;
        $students->save();

        return redirect('students')->with('msg','Success Add New Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $students,$idstudents)
    {
        $data = $students->find($idstudents);
        return view('students.formedit')->with([
            'txtid' =>$idstudents,
            'txtname' =>$data->fullname,
            'txtgender' =>$data->gender,
            'txtaddress' =>$data->address,
            'txtemail' =>$data->emailaddress,
            'txtphone' =>$data->phone

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Students $students,$idstudents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentsRequest $request, Students $students,$idstudents)
    {
        $data = $students->find($idstudents);
        $data =$request->txtid;
        $data->fullname =$request->txtname;
        $data->gender =$request->txtgender;
        $data->address =$request->txtaddress;
        $data->emailaddress =$request->txtemail;
        $data->phone =$request->txtphone;
        $data->save();

        return redirect('students')->with('msg','Success Edit Data '.$data->fullname.' ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Students $students)
    {
        //
    }
}
