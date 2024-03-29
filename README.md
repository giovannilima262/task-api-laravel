
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

## Build
All commits made to the main branch will automatically generate a commit to the heroku project.

