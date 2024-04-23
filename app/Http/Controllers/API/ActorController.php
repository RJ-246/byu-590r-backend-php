<?php

namespace App\Http\Controllers\API;
use App\Models\Actor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActorController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::get();
        return $this->sendResponse($actors, "Actors");
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
        $actor = new Actor;
        $actor->name = $request['name'];
        $actor->birthdate = $request["birthdate"];
        $actor->phone = $request["phone"];
        $actor->save();

        $success["actor"] = $actor;
        return $this->sendResponse($success, "Actor Successfully created");
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
