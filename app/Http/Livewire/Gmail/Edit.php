<?php

namespace App\Http\Livewire\Gmail;

use App\Models\Gmail;
use Livewire\Component;

class Edit extends Component
{
    public Gmail $gmail;

    public function mount(Gmail $gmail)
    {
        $this->gmail = $gmail;
    }

    public function render()
    {
        return view('livewire.gmail.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->gmail->save();

        return redirect()->route('admin.gmails.index');
    }

    protected function rules(): array
    {
        return [
            'gmail.email' => [
                'string',
                'nullable',
            ],
        ];
    }
}
