<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Instructor;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Instructor $instructor;

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
                ->update(['model_id' => $this->instructor->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Instructor $instructor)
    {
        $this->instructor       = $instructor;
        $this->mediaCollections = [

            'instructor_image' => $instructor->image,

        ];
    }

    public function render()
    {
        return view('livewire.instructor.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->instructor->save();
        $this->syncMedia();

        return redirect()->route('admin.instructors.index');
    }

    protected function rules(): array
    {
        return [
            'instructor.title' => [
                'string',
                'nullable',
            ],
            'instructor.designation' => [
                'string',
                'nullable',
            ],
            'mediaCollections.instructor_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.instructor_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'instructor.facebook' => [
                'string',
                'nullable',
            ],
            'instructor.instagram' => [
                'string',
                'nullable',
            ],
            'instructor.linkedin' => [
                'string',
                'nullable',
            ],
        ];
    }
}
