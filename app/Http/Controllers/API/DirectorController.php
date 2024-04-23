<?php

namespace App\Http\Controllers\API;
use App\Models\Director;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DirectorController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::get();
        return $this->sendResponse($directors, "Directors");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required|date',
            'phone' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $director = new Director;
        $director->name = $request['name'];
        $director->birthdate = $request["birthdate"];
        $director->phone = $request["phone"];
        $director->save();

        $success["director"] = $director;
        return $this->sendResponse($success, "Director Successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
