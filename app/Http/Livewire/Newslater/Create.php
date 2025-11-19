<?php

namespace App\Http\Livewire\Newslater;

use App\Models\Newslater;
use Livewire\Component;

class Create extends Component
{
    public Newslater $newslater;

    public function mount(Newslater $newslater)
    {
        $this->newslater = $newslater;
    }

    public function render()
    {
        return view('livewire.newslater.create');
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
