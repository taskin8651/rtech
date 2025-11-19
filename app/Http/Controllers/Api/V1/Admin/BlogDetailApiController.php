<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreBlogDetailRequest;
use App\Http\Requests\UpdateBlogDetailRequest;
use App\Http\Resources\Admin\BlogDetailResource;
use App\Models\BlogDetail;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogDetailApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('blog_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogDetailResource(BlogDetail::all());
    }

    public function store(StoreBlogDetailRequest $request)
    {
        $blogDetail = BlogDetail::create($request->validated());

        if ($request->input('blog_detail_image', false)) {
            $blogDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('blog_detail_image'))))->toMediaCollection('blog_detail_image');
        }

        return (new BlogDetailResource($blogDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BlogDetail $blogDetail)
    {
        abort_if(Gate::denies('blog_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BlogDetailResource($blogDetail);
    }

    public function update(UpdateBlogDetailRequest $request, BlogDetail $blogDetail)
    {
        $blogDetail->update($request->validated());

        if ($request->input('blog_detail_image', false)) {
            if (! $blogDetail->blog_detail_image || $request->input('blog_detail_image') !== $blogDetail->blog_detail_image->file_name) {
                if ($blogDetail->blog_detail_image) {
                    $blogDetail->blog_detail_image->delete();
                }
                $blogDetail->addMedia(storage_path('tmp/uploads/' . basename($request->input('blog_detail_image'))))->toMediaCollection('blog_detail_image');
            }
        } elseif ($blogDetail->blog_detail_image) {
            $blogDetail->blog_detail_image->delete();
        }

        return (new BlogDetailResource($blogDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BlogDetail $blogDetail)
    {
        abort_if(Gate::denies('blog_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blogDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
