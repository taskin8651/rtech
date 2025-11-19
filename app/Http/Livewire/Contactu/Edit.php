<?php

namespace App\Http\Livewire\Contactu;

use App\Models\Contactu;
use Livewire\Component;

class Edit extends Component
{
    public Contactu $contactu;

    public function mount(Contactu $contactu)
    {
        $this->contactu = $contactu;
    }

    public function render()
    {
        return view('livewire.contactu.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->contactu->save();

        return redirect()->route('admin.contactus.index');
    }

    protected function rules(): array
    {
        return [
            'contactu.name' => [
                'string',
                'nullable',
            ],
            'contactu.email' => [
                'string',
                'nullable',
            ],
            'contactu.number' => [
                'string',
                'nullable',
            ],
            'contactu.subject' => [
                'string',
                'nullable',
            ],
            'contactu.nessage' => [
                'string',
                'nullable',
            ],
        ];
    }
}
