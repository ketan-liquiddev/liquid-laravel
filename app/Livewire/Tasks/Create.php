<?php

namespace App\Livewire\Tasks;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Validate;

class Create extends Component
{
    #[Validate('required|string|min:3')]
    public string $title = '';

    #[Validate('required|string|min:3')]
    public string $description = '';

    #[Validate('required|in:active,inactive')]
    public string $status = 'active';  // Set default status

    #[Validate('required|exists:projects,id')]
    public ?int $project_id = null;    // Initialize as null

    #[Validate('nullable|exists:tasks,id')]
    public ?int $parent_id = null;

    public function mount(): void
    {
        // Optional: Set default project if there's only one
        $firstProject = Project::where('status', 'active')->first();
        if ($firstProject) {
            $this->project_id = $firstProject->id;
        }
    }

    public function updatedProjectId(): void
    {
        // Reset parent_id when project changes
        $this->parent_id = null;
    }

    public function save(): void
    {
        $data = $this->validate();
        $data['user_id'] = Auth::id();

        Task::create($data);

        $this->redirectRoute('tasks.index');
    }

    public function render(): View
    {
        return view('livewire.tasks.create', [
            'projects' => Project::where('status', 'active')->get(),
            'availableTasks' => $this->project_id
                ? Task::where('project_id', $this->project_id)->whereNull('parent_id')->get()
                : collect(),
        ]);
    }
}
