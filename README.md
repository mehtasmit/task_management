# Laravel API for Users, Projects, and Tasks

This is a Laravel 12-based RESTful API that manages Users, Projects, and Tasks. The application demonstrates a clean, maintainable architecture that applies key SOLID principles using services, repositories, form requests, and resource responses.

---

## 🔧 Project Setup

1. Clone the repository.
2. Install dependencies:

   ```bash
   composer install
3. Create .env and configure your database.
4. Run migrations and seeders:

php artisan migrate:fresh --seed

5. Serve the app:

php artisan serve


Obtain a token via:

POST /api/login

Use the token in requests:

Authorization: Bearer {token}


##  Project Structure

The architecture follows a clean, layered approach with strong separation of concerns.

app/
├── Http/
│ ├── Controllers/ # Thin controllers
│ ├── Requests/ # Form request validation
│ └── Resources/ # API response formatting
├── Models/ # Eloquent models
├── Repositories/ # Data access layer
│ └── Interfaces/ # Repository contracts
├── Services/ # Business logic layer
│ └── Interfaces/ # Service contracts


-- Controllers only handle request/response. Business logic is in Services.
-- New service or repository logic can be added via interfaces (e.g. TaskService)
-- Interfaces (ProjectServiceInterface) ensure substitutability
-- Service/Repository interfaces keep contracts small and focused
-- Controllers depend on interfaces, not concrete implementations


| Method | URI                        | Description           |
| ------ | -------------------------- | --------------------- |
| GET    | `/api/projects`            | List all projects     |
| POST   | `/api/projects`            | Create a new project  |
| GET    | `/api/projects/{id}`       | Get a single project  |
| POST   | `/api/projects/{id}/tasks` | Add task to a project |
| PATCH  | `/api/tasks/{id}/status`   | Update task status    |


To populate the database with test data:

php artisan migrate:fresh --seed


