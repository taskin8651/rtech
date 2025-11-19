<?php

namespace App\Http\Livewire\CourseDetail;

use App\Models\CourseDetail;
use App\Models\Instructor;
use App\Models\Language;
use App\Models\Lesson;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $languages = [];

    public array $mediaToRemove = [];

    public array $lesson_detail = [];

    public array $listsForFields = [];

    public CourseDetail $courseDetail;

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
                ->update(['model_id' => $this->courseDetail->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(CourseDetail $courseDetail)
    {
        $this->courseDetail  = $courseDetail;
        $this->languages     = $this->courseDetail->languages()->pluck('id')->toArray();
        $this->lesson_detail = $this->courseDetail->lessonDetail()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [

            'course_detail_upload_image' => $courseDetail->upload_image,
            'course_detail_image_1'      => $courseDetail->image_1,

        ];
    }

    public function render()
    {
        return view('livewire.course-detail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->courseDetail->save();
        $this->courseDetail->languages()->sync($this->languages);
        $this->courseDetail->lessonDetail()->sync($this->lesson_detail);
        $this->syncMedia();

        return redirect()->route('admin.course-details.index');
    }

    protected function rules(): array
    {
        return [
            'courseDetail.title' => [
                'string',
                'nullable',
            ],
            'courseDetail.short_description' => [
                'string',
                'nullable',
            ],
            'courseDetail.description' => [
                'string',
                'nullable',
            ],
            'mediaCollections.course_detail_upload_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.course_detail_upload_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.course_detail_image_1' => [
                'array',
                'nullable',
            ],
            'mediaCollections.course_detail_image_1.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'courseDetail.instructor_id' => [
                'integer',
                'exists:instructors,id',
                'nullable',
            ],
            'courseDetail.category' => [
                'string',
                'nullable',
            ],
            'courseDetail.duration' => [
                'string',
                'nullable',
            ],
            'courseDetail.batch' => [
                'string',
                'nullable',
            ],
            'courseDetail.lesson' => [
                'string',
                'nullable',
            ],
            'courseDetail.student' => [
                'string',
                'nullable',
            ],
            'courseDetail.skill_level' => [
                'string',
                'nullable',
            ],
            'courseDetail.language' => [
                'string',
                'nullable',
            ],
            'courseDetail.price' => [
                'string',
                'nullable',
            ],
            'languages' => [
                'array',
            ],
            'languages.*.id' => [
                'integer',
                'exists:languages,id',
            ],
            'lesson_detail' => [
                'array',
            ],
            'lesson_detail.*.id' => [
                'integer',
                'exists:lessons,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['instructor']    = Instructor::pluck('title', 'id')->toArray();
        $this->listsForFields['languages']     = Language::pluck('title', 'id')->toArray();
        $this->listsForFields['lesson_detail'] = Lesson::pluck('title', 'id')->toArray();
    }
}
