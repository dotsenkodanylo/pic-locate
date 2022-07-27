<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteLocationRequest;
use App\Http\Requests\ShowLocationRequest;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Models\Roll;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function store(StoreLocationRequest $request, Roll $roll): LocationResource
    {
        $roll->locations()->create($request->validated());

        return new LocationResource($roll);
    }

    public function show(ShowLocationRequest $request, Location $location): LocationResource
    {
        return new LocationResource($location);
    }

    public function update(UpdateLocationRequest $request, Location $location): LocationResource
    {
        $location->update($request->validated());

        return new LocationResource($location);
    }

    public function delete(DeleteLocationRequest $request, Location $location): JsonResponse
    {
        $location->delete();

        return new JsonResponse(null, 204);
    }
}
