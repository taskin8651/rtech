<?php

namespace App\Http\Livewire\ProjectDetail;

use App\Models\Language;
use App\Models\ProjectDetail;
use App\Models\ProjectType;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $laguage = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public ProjectDetail $projectDetail;

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
                ->update(['model_id' => $this->projectDetail->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(ProjectDetail $projectDetail)
    {
        $this->projectDetail = $projectDetail;
        $this->laguage       = $this->projectDetail->laguage()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [

            'project_detail_code_file' => $projectDetail->code_file,

            'project_detail_upload_image' => $projectDetail->upload_image,
        ];
    }

    public function render()
    {
        return view('livewire.project-detail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->projectDetail->save();
        $this->projectDetail->laguage()->sync($this->laguage);
        $this->syncMedia();

        return redirect()->route('admin.project-details.index');
    }

    protected function rules(): array
    {
        return [
            'projectDetail.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'projectDetail.project_type_id' => [
                'integer',
                'exists:project_types,id',
                'nullable',
            ],
            'projectDetail.title' => [
                'string',
                'nullable',
            ],
            'projectDetail.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.project_detail_code_file' => [
                'array',
                'nullable',
            ],
            'mediaCollections.project_detail_code_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'projectDetail.created_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'projectDetail.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
            'laguage' => [
                'array',
            ],
            'laguage.*.id' => [
                'integer',
                'exists:languages,id',
            ],
            'mediaCollections.project_detail_upload_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.project_detail_upload_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['project_type'] = ProjectType::pluck('title', 'id')->toArray();
        $this->listsForFields['created_by']   = User::pluck('name', 'id')->toArray();
        $this->listsForFields['status']       = $this->projectDetail::STATUS_SELECT;
        $this->listsForFields['laguage']      = Language::pluck('title', 'id')->toArray();
    }
}
