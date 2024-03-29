<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestinationCreateRequest;
use App\Http\Requests\DestinationUpdateRequest;
use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destination = Destination::all();

        if (is_null($destination)) {
            return response()->json(['message' => 'Destination Not Found'], 404);
        }

        return DestinationResource::collection($destination);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DestinationCreateRequest $request)
    {
        $destination = Destination::create($request->validated());

        if (!$destination) {
            return response()->json(['message' => 'Failed to create the destination'], 500);
        }

        return new DestinationResource($destination);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $destination = Destination::findOrFail($id);

        if (is_null($destination)) {
            return response()->json(['message' => 'Destination Not Found'], 404);
        }

        return new DestinationResource($destination);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DestinationUpdateRequest $request, int $id)
    {
        $destination = Destination::findOrFail($id);

        if (is_null($destination)) {
            return response()->json(['message' => 'Destination Not Found'], 404);
        }

        if (!$destination->update($request->validated())) {
            return response()->json(['message' => 'Failed to update the destination'], 500);
        }

        return new DestinationResource($destination);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $destination = Destination::findOrFail($id);

        if (is_null($destination)) {
            return response()->json(['message' => 'Destination Not Found'], 404);
        }

        if (!$destination->delete()) {
            return response()->json(['message' => 'Failed to delete the destination'], 500);
        }

        return response()->json(['message' => 'Destination has been deleted'], 200);
    }
}
