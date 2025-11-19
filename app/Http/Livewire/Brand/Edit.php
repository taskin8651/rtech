<?php

namespace App\Http\Livewire\Brand;

use App\Models\Brand;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Brand $brand;

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

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->brand->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Brand $brand)
    {
        $this->brand            = $brand;
        $this->mediaCollections = [

            'brand_logo' => $brand->logo,
        ];
    }

    public function render()
    {
        return view('livewire.brand.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->brand->save();
        $this->syncMedia();

        return redirect()->route('admin.brands.index');
    }

    protected function rules(): array
    {
        return [
            'brand.title' => [
                'string',
                'nullable',
            ],
            'mediaCollections.brand_logo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.brand_logo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
