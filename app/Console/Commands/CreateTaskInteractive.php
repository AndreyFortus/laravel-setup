<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class CreateTaskInteractive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:create-interactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Interactive task creation';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('New task creation');

        $title = $this->ask('Enter task title');
        $description = $this->ask('Short description');
        $dueDate = $this->ask('Deadline (YYYY-MM-DD)');

        $status = $this->choice('Choose status', ['new', 'in_progress', 'done'], 0);

        // For DB
        $projectId = $this->ask('Enter project id');
        $assigneeId = $this->ask('Assignee id');

        if ($this->confirm('Create new task?', true)) {

            $data = [
                'title' => $title,
                'description' => $description ?: null,
                'due_date' => $dueDate ?: null,
                'status' => $status,
                'project_id' => $projectId,
                'author_id' => 1,
            ];

            if (!empty($assigneeId)) {
                $data['assigned_to'] = $assigneeId;
            }

            $task = Task::create($data);

            $this->info("Task '{$task->title}' created with id: {$task->id}");

        } else {
            $this->warn('Task creation cancelled');
        }
    }
}
