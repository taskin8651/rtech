<?php

namespace App\Http\Livewire\WebsiteLogo;

use App\Models\WebsiteLogo;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public WebsiteLogo $websiteLogo;

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
                ->update(['model_id' => $this->websiteLogo->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(WebsiteLogo $websiteLogo)
    {
        $this->websiteLogo = $websiteLogo;
    }

    public function render()
    {
        return view('livewire.website-logo.create');
    }

    public function submit()
    {
        $this->validate();

        $this->websiteLogo->save();
        $this->syncMedia();

        return redirect()->route('admin.website-logos.index');
    }

    protected function rules(): array
    {
        return [
            'websiteLogo.tilte' => [
                'string',
                'nullable',
            ],
            'mediaCollections.website_logo_logo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.website_logo_logo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'websiteLogo.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
