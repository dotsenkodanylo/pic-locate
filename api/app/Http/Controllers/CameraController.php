<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowCameraRequest;
use App\Http\Requests\StoreCameraRequest;
use App\Http\Requests\UpdateCameraRequest;
use App\Http\Resources\CameraResource;
use App\Models\Camera;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CameraController extends Controller
{
    public function show(ShowCameraRequest $request, Camera $camera): CameraResource
    {
        return new CameraResource($camera);
    }

    public function index(Request $request): ResourceCollection
    {
        return CameraResource::collection($request->user()->cameras()->paginate(5));
    }

    public function store(StoreCameraRequest $request): CameraResource
    {
        $newCamera = $request->user()->cameras()->create(
            $request->validated()
        );

        return new CameraResource($newCamera);
    }

    public function update(UpdateCameraRequest $request, Camera $camera): CameraResource
    {
        $camera->update($request->validated());

        return new CameraResource($camera);
    }

    public function delete(Request $request, Camera $camera): JsonResponse
    {
        $camera->delete();

        return new JsonResponse(null, 204);
    }
}
