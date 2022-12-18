<?php

namespace App\Http\Controllers\Api;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\OnlineContentRequest;
use App\Http\Resources\OnlineContentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentController extends Controller
{
    public function index(Request $request): JsonResource
    {
        $results = Content::query()
            ->search($request, 'name')
            ->orderBy('id', 'DESC')
            ->paginate(is_numeric($request->perPage) ? $request->perPage : 10, ['*'], 'page', is_numeric($request->currentPage) ? $request->currentPage : 1);

        return OnlineContentResource::collection($results);
    }

    public function show(Content $content): JsonResource
    {
        return OnlineContentResource::make($content);
    }

    public function update(OnlineContentRequest $request, Content $content): Response
    {
        $data = $request->validated();

        // Upload file
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('online-content', ['disk' => 'public']);
            $data['file'] = env('STORAGE_PATH') . 'app/public/' . $path;
        }

        $content->update($data);
        return response('', Response::HTTP_OK);
    }

    public function store(OnlineContentRequest $request)
    {
        // Upload file
        $path = $request->file('file')->store('online-content', ['disk' => 'public']);
        $path = env('STORAGE_PATH') . 'app/public/' . $path;

        Content::create(['file' => $path] + $request->validated());

        return response()->noContent(Response::HTTP_CREATED);
    }


    public function destroy(Content $content): Response
    {
        // Delete the adaa
        $content->delete();

        return response('', Response::HTTP_OK); // 200
    }
}
