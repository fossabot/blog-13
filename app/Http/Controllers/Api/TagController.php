<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Http\Resources\Tag as TagResource;
use App\Models\Tag;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class TagController extends Controller
{
    /**
     * Return the categories.
     *
     * @param Request $request
     * @param Tag $tag
     * @return ResourceCollection
     */
    public function index(Request $request, Tag $tag): ResourceCollection
    {
        return TagResource::collection(
            $tag->latest()
                ->paginate($request->input('limit', 20))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return TagResource
     * @throws AuthorizationException
     */
    public function update(TagRequest $request, Tag $tag): TagResource
    {
        $this->authorize('update', $tag);

        $tag->update($request->all());

        return new TagResource($tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @param Tag $tag
     * @return TagResource
     * @throws AuthorizationException
     */
    public function store(TagRequest $request, Tag $tag): TagResource
    {
        $this->authorize('store', Tag::class);

        return new TagResource(
            $tag->create($request->all())
        );
    }

    /**
     * Return the specified resource.
     * @param Tag $tag
     * @return TagResource
     */
    public function show(Tag $tag): TagResource
    {
        return new TagResource($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return Response
     * @throws AuthorizationException
     * @throws \Exception
     */
    public function destroy(Tag $tag): Response
    {
        $this->authorize('delete', $tag);

        $tag->delete();

        return response()->noContent();
    }
}
