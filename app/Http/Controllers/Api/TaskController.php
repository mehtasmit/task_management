<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskStatusRequest;
use App\Http\Resources\TaskResource;
use App\Services\Interfaces\TaskServiceInterface;
use Exception;

class TaskController extends Controller
{
    public function __construct(
        protected TaskServiceInterface $taskService
    ) {}

    /**
     * GET /api/projects
     * List all projects of the logged-in user
     */
    public function index($projectId)
    {
        try {
            $projects = $this->taskService->getByProjectId($projectId);

            return TaskResource::collection($projects);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong for fetching projects',
                'error' => $e->getMessage(),
            ], 500);

        }
    }

    /**
     * POST /api/projects/{project_id}/tasks
     * Add a new task to a project
     */
    public function store(StoreTaskRequest $request, $project_id)
    {
        try {
            $data = $request->validated();
            $data['project_id'] = $project_id;

            $task = $this->taskService->create($data);

            return new TaskResource($task);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong for creating task',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * PATCH /api/tasks/{id}/status
     * Update the status of a task
     */
    public function updateStatus(UpdateTaskStatusRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $task = $this->taskService->updateStatus($id, $data['status']);

            return new TaskResource($task);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong for updating task status',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
