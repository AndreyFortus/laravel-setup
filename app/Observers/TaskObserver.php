<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Support\Facades\Log;

class TaskObserver
{
    /**
     * Handle the Task "created" event.
     */
    public function created(Task $task): void
    {
        Log::info("Created new task. id: {$task->id}, title: {$task->title}");
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        Log::info("Task updated. id: {$task->id}");
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        Log::warning("Task deleted. id: {$task->id}, title: {$task->title}");
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
