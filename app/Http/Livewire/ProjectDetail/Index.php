<?php

namespace App\Http\Livewire\ProjectDetail;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\ProjectDetail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new ProjectDetail())->orderable;
    }

    public function render()
{
    $query = ProjectDetail::with(['user', 'projectType', 'createdBy', 'laguage']);

    // 👇 If NOT Admin → Show only user's own created projects
    if (!auth()->user()->is_admin) {
        $query->where('created_by_id', auth()->id());
    }

    // Existing filters
    $query = $query->advancedFilter([
        's'               => $this->search ?: null,
        'order_column'    => $this->sortBy,
        'order_direction' => $this->sortDirection,
    ]);

    $projectDetails = $query->paginate($this->perPage);

    return view('livewire.project-detail.index', compact('projectDetails', 'query'));
}

    public function deleteSelected()
    {
        abort_if(Gate::denies('project_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        ProjectDetail::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(ProjectDetail $projectDetail)
    {
        abort_if(Gate::denies('project_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projectDetail->delete();
    }
}
