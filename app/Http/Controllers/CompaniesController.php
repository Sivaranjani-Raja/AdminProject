<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;



class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::all();
        return view ('companies.index')->with('company', $company);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'email',
            'logo' => 'image|mimes:jpg,jpeg,png'
        ]);

        $input = $request->all();
        
        if($request->file('logo')){
            $designationa_path = 'public/logo';
            $file= $request->file('logo');
            $filename= $file->getClientOriginalName();
            $path = $request->file('logo')->storeAs( $designationa_path, $filename);
            $input['logo']= $filename;
        }


        Company::create($input);
        return redirect('/companies')->with('flash_message', 'Company Details Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:191',
            'email' => 'email'
        ]);
        
        $company = Company::find($id);
        $input = $request->all();

        if ($image = $request->file('logo')) {
            $designationa_path = 'public/logo';
            $file= $request->file('logo');
            $filename= $file->getClientOriginalName();
            $path = $request->file('logo')->storeAs( $designationa_path, $filename);
            $input['logo']= $filename;
        }else{
            unset($input['logo']);
        }

        $company->update($input);
        return redirect('companies')->with('flash_message', 'Company Details Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('companies')->with('flash_message', 'Company Details deleted!');
    }
}
