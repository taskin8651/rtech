<?php

namespace App\Http\Livewire\Youtube;

use App\Models\Youtube;
use Livewire\Component;

class Edit extends Component
{
    public Youtube $youtube;

    public function mount(Youtube $youtube)
    {
        $this->youtube = $youtube;
    }

    public function render()
    {
        return view('livewire.youtube.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->youtube->save();

        return redirect()->route('admin.youtubes.index');
    }

    protected function rules(): array
    {
        return [
            'youtube.title' => [
                'string',
                'nullable',
            ],
            'youtube.url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
