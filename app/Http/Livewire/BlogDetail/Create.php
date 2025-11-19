<?php

namespace App\Http\Livewire\BlogDetail;

use App\Models\BlogDetail;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public BlogDetail $blogDetail;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->blogDetail->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(BlogDetail $blogDetail)
    {
        $this->blogDetail = $blogDetail;
    }

    public function render()
    {
        return view('livewire.blog-detail.create');
    }

    public function submit()
    {
        $this->validate();

        $this->blogDetail->save();
        $this->syncMedia();

        return redirect()->route('admin.blog-details.index');
    }

    protected function rules(): array
    {
        return [
            'blogDetail.title' => [
                'string',
                'nullable',
            ],
            'blogDetail.short_description' => [
                'string',
                'nullable',
            ],
            'blogDetail.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.blog_detail_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.blog_detail_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
