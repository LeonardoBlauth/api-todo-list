<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $validFields = Task::class()->getFillable();

        $resource = QueryBuilder::for(Task::class())
            ->allowedFields($validFields)
            ->allowedFilters($validFields)
            ->allowedSort($validFields)
            ->get();

        return response()
            ->json(
                $resource,
                200
            );
    }

    public function store(Request $request): JsonResponse
    {
        return response()
            ->json(
                Task::create($request),
                201
            );
    }

    public function show($id): JsonResponse
    {
        $validFields = Task::class()->getFillable();

        $resource = QueryBuilder::for(Task::class())
            ->where('id', $id)
            ->allowedFields($validFields)
            ->allowedFilters($validFields)
            ->allowedSort($validFields)
            ->get();

        return is_null($resource)
            ?
            response()
            ->json(
                null,
                204
            )
            :
            response()
            ->json(
                $resource,
                200
            );
    }

    public function update(Request $request, $id): JsonResponse
    {
        $resource = Task::findOrFail($id);
        $resource->save();

        return response()
            ->json(
                $resource,
                200
            );
    }

    public function destroy($id): JsonResponse
    {
        $qtyResourcesRemoved = Task::destroy($id);

        return $qtyResourcesRemoved === 0
            ?
            response()
            ->json(
                [
                    'Error' => 'Resource not found'
                ],
                404
            )
            :
            response()
            ->json(
                null,
                204
            );
    }
}
