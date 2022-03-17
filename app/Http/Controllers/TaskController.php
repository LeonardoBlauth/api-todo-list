<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $validFields = Task::make()->getFillable();

        $resource = QueryBuilder::for(Task::make())
            ->allowedFields($validFields)
            ->allowedFilters($validFields)
            ->allowedSorts($validFields)
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
                Task::create($request->toArray()),
                201
            );
    }

    public function show($id): JsonResponse
    {
        $validFields = Task::make()->getFillable();

        $resource = QueryBuilder::for(Task::make())
            ->where('id', $id)
            ->allowedFields($validFields)
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

        $resource->fill($request->toArray());
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
