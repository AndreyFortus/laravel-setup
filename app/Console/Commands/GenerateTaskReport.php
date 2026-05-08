<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class GenerateTaskReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:report {--project_id= : filter by project_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create tasks report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $projectId = $this->option('project_id');
        $query = Task::query();

        if ($projectId) {
            $query->where('project_id', $projectId);
            $this->info("Report for project: {$projectId}");
        } else {
            $this->info("Report for all projects");
        }

        $tasks = $query->get();

        if ($tasks->isEmpty()) {
            $this->warn('Tasks not found');
            return;
        }

        $tableData = $tasks->map(function ($task) {
            return [
                'Id' => $task->id,
                'Title' => $task->title,
                'Status' => $task->status,
                'Deadline' => $task->due_date ?? 'Not specified',
            ];
        });

        $this->table(['Id', 'Title', 'Status', 'Deadline'], $tableData);
    }
}
