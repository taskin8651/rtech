<?php

namespace App\Http\Livewire\Address;

use App\Models\Address;
use Livewire\Component;

class Create extends Component
{
    public Address $address;

    public function mount(Address $address)
    {
        $this->address = $address;
    }

    public function render()
    {
        return view('livewire.address.create');
    }

    public function submit()
    {
        $this->validate();

        $this->address->save();

        return redirect()->route('admin.addresses.index');
    }

    protected function rules(): array
    {
        return [
            'address.title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
