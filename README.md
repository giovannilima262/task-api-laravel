
## About the Project

- Project created for technical evaluation, with the main goal of performing CRUD operations on the Task model.
* PHP v8.2
* Laravel v11.1.0

### Teste local

1. Switch the database to SQLite:
- Modify the line `DB_CONNECTION=mysql` to `DB_CONNECTION=sqlite` in the `.env` file and comment out all the following parameters:<br/>
`DB_HOST=*`<br/>
`DB_PORT=*`<br/>
`DB_DATABASE=*`<br/>
`DB_USERNAME=*`<br/>
`DB_PASSWORD=*`<br/>
- Or change `.env.example` to `.env`.

2. Run the database migration:
```bash
php artisan migrate
```

3. Run the application:
```bash
composer install
```
```bash
php artisan key:generate
```
```bash
php artisan serve
```
Claro, aqui está o texto formatado para o `README.md`:

---

## Endpoints

### GET `/api/tasks`

- **Description**: Get all tasks.
- **Response**:
  - `200 OK`: Returns a JSON object with a list of tasks.

### POST `/api/tasks`

- **Description**: Create a new task.
- **Request Body**:
  - `title` (required): The title of the task.
  - `description` (required): The description of the task.
- **Response**:
  - `200 OK`: Returns a JSON object with the created task.
  - `422 Unprocessable Entity`: If validation fails.

### GET `/api/tasks/{id}`

- **Description**: Get a specific task by ID.
- **Parameters**:
  - `id` (integer, required): The ID of the task.
- **Response**:
  - `200 OK`: Returns a JSON object with the task.
  - `422 Unprocessable Content`: If the task with the given ID is not found.

### PUT/PATCH `/api/tasks/{id}`

- **Description**: Update a specific task by ID.
- **Parameters**:
  - `id` (integer, required): The ID of the task.
- **Request Body**:
  - `title`: The updated title of the task.
  - `description`: The updated description of the task.
- **Response**:
  - `200 OK`: Returns a JSON object with the updated task.
  - `422 Unprocessable Entity`: If validation fails.

### DELETE `/api/tasks/{id}`

- **Description**: Delete a specific task by ID.
- **Parameters**:
  - `id` (integer, required): The ID of the task.
- **Response**:
  - `200 OK`: Returns a JSON object with a success message.
  - `422 Unprocessable Entity`: If validation fails.


## Build
All commits made to the main branch will automatically generate a commit to the heroku project.

