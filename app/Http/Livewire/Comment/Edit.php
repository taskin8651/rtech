<?php

namespace App\Http\Livewire\Comment;

use App\Models\Comment;
use App\Models\ProjectDetail;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Comment $comment;

    public array $listsForFields = [];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.comment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->comment->save();

        return redirect()->route('admin.comments.index');
    }

    protected function rules(): array
    {
        return [
            'comment.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'comment.blog_id' => [
                'integer',
                'exists:project_details,id',
                'nullable',
            ],
            'comment.comment' => [
                'string',
                'nullable',
            ],
            'comment.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']   = User::pluck('name', 'id')->toArray();
        $this->listsForFields['blog']   = ProjectDetail::pluck('title', 'id')->toArray();
        $this->listsForFields['status'] = $this->comment::STATUS_SELECT;
    }
}
