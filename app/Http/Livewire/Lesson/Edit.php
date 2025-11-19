<?php

namespace App\Http\Livewire\Lesson;

use App\Models\Lesson;
use Livewire\Component;

class Edit extends Component
{
    public Lesson $lesson;

    public function mount(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    public function render()
    {
        return view('livewire.lesson.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->lesson->save();

        return redirect()->route('admin.lessons.index');
    }

    protected function rules(): array
    {
        return [
            'lesson.month' => [
                'string',
                'nullable',
            ],
            'lesson.title' => [
                'string',
                'nullable',
            ],
            'lesson.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
