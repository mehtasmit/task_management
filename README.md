# Laravel API for Users, Projects, and Tasks

This is a Laravel 12-based RESTful API that manages Users, Projects, and Tasks. The application demonstrates a clean, maintainable architecture that applies key SOLID principles using services, repositories, form requests, and resource responses.

---

## Project Setup

1. Clone the repository.
2. Install dependencies:
   `composer install`
3. Create .env and configure your database.
4. Run migrations and seeders: `php artisan migrate:fresh --seed`
5. Serve the app:`php artisan serve`


Obtain a token via: `POST /api/login`

Use the token in requests:

Authorization: Bearer {token}


##  Project Structure

The architecture follows a clean, layered approach with strong separation of concerns.

- app -> Http -> Controllers // Thin controllers
- app -> Requests // Form request validation
- app -> Resources // API response formatting
- app -> Models //  Eloquent models
- app -> Repositories -> Interfaces // Data access layer
- app -> Services -> -> Interfaces // Business logic laye

**SOLID Principles implemented**
- Controllers only handle request/response. Business logic is in Services.
- New service or repository logic can be added via interfaces (e.g. TaskService)
- Interfaces (ProjectServiceInterface) ensure substitutability
- Service/Repository interfaces keep contracts small and focused
- Controllers depend on interfaces, not concrete implementations

**APIs**

| Method | URI                        | Description           |
| ------ | -------------------------- | --------------------- |
| GET    | `/api/projects`            | List all projects     |
| POST   | `/api/projects`            | Create a new project  |
| GET    | `/api/projects/{id}`       | Get a single project  |
| POST   | `/api/projects/{id}/tasks` | Add task to a project |
| PATCH  | `/api/tasks/{id}/status`   | Update task status    |


To populate the database with test data:`php artisan migrate:fresh --seed`

API collection - `Task Management.postman_collection.json`

Run tests - `php artisan test`

