<?php

namespace App\Livewire\Tasks;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\Attributes\Validate;

class Edit extends Component
{
    #[Validate('required|string')]
    public string $title = '';

    #[Validate('required|string')]
    public string $description = '';

    #[Validate('required|in:active,inactive')]
    public string $status = 'active';  // Set default status

    #[Validate('required|exists:projects,id')]
    public ?int $project_id = null;    // Initialize as null

    public Task $task;

    public function mount(Task $task): void
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->project_id = $task->project_id;
    }

    public function save(): void
    {
        $data = $this->validate();

        $this->task->update($data);

        $this->redirectRoute('tasks.index');
    }

    public function render(): View
    {
        return view('livewire.tasks.edit', [
            'projects' => Project::where('status', 'active')->get(),
        ]);
    }
}
