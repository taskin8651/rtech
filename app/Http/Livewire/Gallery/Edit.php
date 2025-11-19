<?php

namespace App\Http\Livewire\Gallery;

use App\Models\Gallery;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Gallery $gallery;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->gallery->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Gallery $gallery)
    {
        $this->gallery = $gallery;
        $this->initListsForFields();
        $this->mediaCollections = [

            'gallery_upload' => $gallery->upload,

        ];
    }

    public function render()
    {
        return view('livewire.gallery.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->gallery->save();
        $this->syncMedia();

        return redirect()->route('admin.galleries.index');
    }

    protected function rules(): array
    {
        return [
            'gallery.title' => [
                'string',
                'nullable',
            ],
            'mediaCollections.gallery_upload' => [
                'array',
                'nullable',
            ],
            'mediaCollections.gallery_upload.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'gallery.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->gallery::STATUS_SELECT;
    }
}
