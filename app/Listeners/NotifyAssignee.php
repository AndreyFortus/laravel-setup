<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
class NotifyAssignee
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TaskCreated $event): void
    {
        $task = $event->task;
        $assigneeId = $task->assigned_to ?? $task->assignee_id;

        if ($assigneeId) {
            Log::info("NotifyAssignee: {$assigneeId} assigned new task: '{$task->title}'.");
        }
    }
}
