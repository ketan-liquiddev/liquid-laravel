<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;
use Illuminate\View\View;
use Livewire\WithPagination;

class ProjectIndex extends Component
{
    use WithPagination;
    public function delete(int $id): void
    {
        Project::where('id', $id)->delete();
    }
    public function render(): View
    {
        return view('livewire.projects.index', [
            'projects' => Project::paginate(10),
        ]);
    }
}
