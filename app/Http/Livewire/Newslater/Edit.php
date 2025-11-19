<?php

namespace App\Http\Livewire\Newslater;

use App\Models\Newslater;
use Livewire\Component;

class Edit extends Component
{
    public Newslater $newslater;

    public function mount(Newslater $newslater)
    {
        $this->newslater = $newslater;
    }

    public function render()
    {
        return view('livewire.newslater.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->newslater->save();

        return redirect()->route('admin.newslaters.index');
    }

    protected function rules(): array
    {
        return [
            'newslater.mail' => [
                'string',
                'nullable',
            ],
        ];
    }
}
