<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('contactu_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Contactu" format="csv" />
                <livewire:excel-export model="Contactu" format="xlsx" />
                <livewire:excel-export model="Contactu" format="pdf" />
            @endif


            @can('contactu_create')
                <x-csv-import route="{{ route('admin.contactus.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.contactu.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.number') }}
                            @include('components.table.sort', ['field' => 'number'])
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.subject') }}
                            @include('components.table.sort', ['field' => 'subject'])
                        </th>
                        <th>
                            {{ trans('cruds.contactu.fields.nessage') }}
                            @include('components.table.sort', ['field' => 'nessage'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contactus as $contactu)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $contactu->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $contactu->id }}
                            </td>
                            <td>
                                {{ $contactu->name }}
                            </td>
                            <td>
                                {{ $contactu->email }}
                            </td>
                            <td>
                                {{ $contactu->number }}
                            </td>
                            <td>
                                {{ $contactu->subject }}
                            </td>
                            <td>
                                {{ $contactu->nessage }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('contactu_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.contactus.show', $contactu) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('contactu_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.contactus.edit', $contactu) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('contactu_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $contactu->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $contactus->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush