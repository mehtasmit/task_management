<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Services\Interfaces\ProjectServiceInterface;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectServiceInterface $projectService
    ) {}

    /**
     * GET /api/projects
     * List all projects of the logged-in user
     */
    public function index(Request $request)
    {
        try {
            $userId = $request->user()->id;
            $projects = $this->projectService->listUserProjects($userId);

            return ProjectResource::collection($projects);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong for fetching tasks',
                'error' => $e->getMessage(),
            ], 500);

        }
    }

    /**
     * POST /api/projects
     * Create a new project
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = $request->user()->id;

            $project = $this->projectService->create($data);

            return response()->json($project, 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong for creating project',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    /**
     * GET /api/projects/{id}
     * Get details of a single project
     */
    public function show($id)
    {
        try {
            $project = $this->projectService->getById($id);

            return new ProjectResource($project);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong for fetching project',
                'error' => $e->getMessage(),
            ], 404);
        }
    }
}
