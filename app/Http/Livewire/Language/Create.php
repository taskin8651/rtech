<?php

namespace App\Http\Livewire\Language;

use App\Models\Language;
use Livewire\Component;

class Create extends Component
{
    public Language $language;

    public function mount(Language $language)
    {
        $this->language = $language;
    }

    public function render()
    {
        return view('livewire.language.create');
    }

    public function submit()
    {
        $this->validate();

        $this->language->save();

        return redirect()->route('admin.languages.index');
    }

    protected function rules(): array
    {
        return [
            'language.title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
