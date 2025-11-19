<?php

namespace App\Http\Livewire\Map;

use App\Models\Map;
use Livewire\Component;

class Edit extends Component
{
    public Map $map;

    public function mount(Map $map)
    {
        $this->map = $map;
    }

    public function render()
    {
        return view('livewire.map.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->map->save();

        return redirect()->route('admin.maps.index');
    }

    protected function rules(): array
    {
        return [
            'map.map_url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
