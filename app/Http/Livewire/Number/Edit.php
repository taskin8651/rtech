<?php

namespace App\Http\Livewire\Number;

use App\Models\Number;
use Livewire\Component;

class Edit extends Component
{
    public Number $number;

    public function mount(Number $number)
    {
        $this->number = $number;
    }

    public function render()
    {
        return view('livewire.number.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->number->save();

        return redirect()->route('admin.numbers.index');
    }

    protected function rules(): array
    {
        return [
            'number.title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
