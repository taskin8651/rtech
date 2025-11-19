<?php

namespace App\Http\Livewire\Officetime;

use App\Models\Officetime;
use Livewire\Component;

class Edit extends Component
{
    public Officetime $officetime;

    public function mount(Officetime $officetime)
    {
        $this->officetime = $officetime;
    }

    public function render()
    {
        return view('livewire.officetime.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->officetime->save();

        return redirect()->route('admin.officetimes.index');
    }

    protected function rules(): array
    {
        return [
            'officetime.start' => [
                'string',
                'nullable',
            ],
            'officetime.end' => [
                'string',
                'nullable',
            ],
            'officetime.days' => [
                'string',
                'nullable',
            ],
        ];
    }
}
