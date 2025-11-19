<?php

namespace App\Http\Livewire\ProjectType;

use App\Models\ProjectType;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public ProjectType $projectType;

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
                ->update(['model_id' => $this->projectType->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(ProjectType $projectType)
    {
        $this->projectType      = $projectType;
        $this->mediaCollections = [

            'project_type_image' => $projectType->image,
        ];
    }

    public function render()
    {
        return view('livewire.project-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->projectType->save();
        $this->syncMedia();

        return redirect()->route('admin.project-types.index');
    }

    protected function rules(): array
    {
        return [
            'projectType.title' => [
                'string',
                'nullable',
            ],
            'projectType.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.project_type_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.project_type_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
