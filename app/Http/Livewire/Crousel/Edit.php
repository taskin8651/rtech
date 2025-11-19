<?php

namespace App\Http\Livewire\Crousel;

use App\Models\Crousel;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Crousel $crousel;

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
                ->update(['model_id' => $this->crousel->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Crousel $crousel)
    {
        $this->crousel = $crousel;
        $this->initListsForFields();
        $this->mediaCollections = [

            'crousel_upload_image' => $crousel->upload_image,

        ];
    }

    public function render()
    {
        return view('livewire.crousel.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->crousel->save();
        $this->syncMedia();

        return redirect()->route('admin.crousels.index');
    }

    protected function rules(): array
    {
        return [
            'crousel.title' => [
                'string',
                'nullable',
            ],
            'mediaCollections.crousel_upload_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.crousel_upload_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'crousel.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['status'] = $this->crousel::STATUS_SELECT;
    }
}
