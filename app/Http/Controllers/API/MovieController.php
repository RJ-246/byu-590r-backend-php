<?php

namespace App\Http\Controllers\API;
use App\Models\Movie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class MovieController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genre', 'director', 'actors')->get();
        foreach($movies as $movie) {
            $movie->picture = $this->getS3Url($movie->picture);
        }
        return $this->sendResponse($movies, 'Movies');
    }

    public function show($id){
        $movie = Movie::where('id',$id)->with([fk.field])->first();
        $movie->picture = $this->getS3Url($movie->picture);
        return $this->sendResponse($movies, 'Movie');
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
            'title' => 'required',
            'description' => 'required',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'year_released' => 'required|integer|min:1888'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $movie = new Movie;
        if ($request->hasFile('picture')) {
            $extension = request()->file('picture')->getClientOriginalExtension();
            $image_name = time() .'_movie_picture' . '.' . $extension;
            $path = $request->file('picture')->storeAs(
                'images',
                $image_name,
                's3'
            );
            Storage::disk('s3')->setVisibility($path, 'public');
            if(!$path) {
                return $this->sendError($path, 'Movie picture failed to upload!');
            }

            $movie->picture = $path;
        }

        $movie->title = $request['title'];
        $movie->description = $request['description'];
        $movie->year_released = $request['year_released'];

        $movie->save();

        if(isset($movie->picture)){
            $movie->picture = $this->getS3Url($movie->picture);
        }
        $success['movie'] = $movie->load('genre', 'director', 'actors');
        return $this->sendResponse($success, 'Movie succesfully created!');
    }

    /**
     * Display the specified resource.
     */

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
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'year_released' => 'required|integer|min:1888'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $movie = Movie::findOrFail($id);
        $movie->title = $request['title'];
        $movie->description = $request['description'];
        $movie->year_released = $request['year_released'];
        $movie->save();

        if(isset($movie->picture)){
            $movie->picture = $this->getS3Url($movie->picture);
        }
        $success['movie'] = $movie;
        return $this->sendResponse($success, 'Movie succesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);
        Storage::disk('s3')->delete($movie->picture);
        $movie->delete();

        $success['movie']['id'] = $id;
        return $this->sendResponse($success, 'Movie Deleted');

    }

    public function updateMoviePicture(Request $request, string $id)
    {
        $movie = Movie::findOrFail($id);
        Storage::disk('s3')->delete($movie->picture);
        if ($request->hasFile('picture')) {
            $extension = request()->file('picture')->getClientOriginalExtension();
            $image_name = time() .'_movie_picture' . '.' . $extension;
            $path = $request->file('picture')->storeAs(
                'images',
                $image_name,
                's3'
            );
            Storage::disk('s3')->setVisibility($path, 'public');
            if(!$path) {
                return $this->sendError($path, 'Movie picture failed to upload!');
            }
            $movie->picture = $path;
            $movie->save();

            if(isset($movie->picture)){
                $movie->picture = $this->getS3Url($movie->picture);
            }
            $success['movie'] = $movie;
            return $this->sendResponse($success, 'Movie picture succesfully updated!');

        }
    }
}
