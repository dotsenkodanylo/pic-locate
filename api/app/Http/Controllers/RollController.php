<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatchRollRequest;
use App\Http\Requests\ShowRollRequest;
use App\Http\Requests\StoreRollRequest;
use App\Http\Resources\RollResource;
use App\Models\Camera;
use App\Models\Roll;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RollController extends Controller
{
    public function show(ShowRollRequest $request, Roll $roll): RollResource
    {
        return new RollResource($roll);
    }

    public function index(Request $request, Camera $camera): ResourceCollection
    {
        return RollResource::collection($camera->rolls()->paginate(10));
    }

    // Add option to transfer to different camera.
    public function update(PatchRollRequest $request, Roll $roll): RollResource
    {
        $roll->update($request->validated());

        // Do we need to refresh it to get the latest fields? Test this.
        return new RollResource($roll->refresh());
    }

    public function store(StoreRollRequest $request, Camera $camera): RollResource
    {
        $newRoll = $camera->rolls()->create(
            $request->validated()
        );

        return new RollResource($newRoll);
    }

    public function delete(Request $request, Roll $roll): JsonResponse
    {
        $roll->delete();

        return new JsonResponse(null, 204);
    }
}
