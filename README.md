## 🖥Property Brokers Rest Api with Laravel

#### This is the official documentation for the Property Brokers API, which provides endpoints for managing properties and brokers (only backend) .

## Technologies

**Project is created with**

- Laravel Framework v10.46.0
- MySQL: v8.0.27
- Postman

## Key Features

The Project offers the following key features:

- **User Authentication**:

**POST /login**: Used to authenticate users. Requires email and password fields in the request body.

**POST /register**: Allows users to register a new account. Requires name, email, and password fields in the request body.

- **Protected Routes**:

The following routes require authentication with a valid JWT token.

**POST /logout**: Logs out the authenticated user.

**Resource: /brokers**: Manages brokers. Allowed methods: GET (index), POST (store), PUT/PATCH (update), DELETE (destroy).

**Resource: /property**: Manages properties. Allowed methods: GET (index), POST (store), PUT/PATCH (update), DELETE (destroy).

- **Public Routes**:

These routes are accessible without authentication.

**GET /property**: Retrieves a list of all properties.

**GET /property/{id}**: Retrieves details of a specific property by ID.

**GET /brokers**: Retrieves a list of all brokers.

**GET /brokers/{id}**: Retrieves details of a specific broker by ID.

- Check endpoints

```bash
php artisan route:list
```

## Installation

To install and run the application, follow these steps:

**1. Clone the repository**

```bash
git clone https://github.com/petermuladi/property-brokers-api.git
```

**2. Go to project folder**

- property-brokers-api/my-app

**3. Install dependencies**

```bash
composer install
```

**4. Create a new .env file**

```bash
cp .env.example .env
```

**5. Update the .env file with your database credentials**

```bash
DB_DATABASE=[your-database-name]
DB_USERNAME=[your-database-username]
DB_PASSWORD=[your-database-password]
```

**6. Generate an application key**

```bash
php artisan key:generate
```

**7. Run database migrations**

```bash
php artisan migrate:fresh --seed
```

**8. Start the web server**

```bash
php artisan serve
```

**8. Navigate to the project URL**

```bash
localhost:8000
```

## Additional Notes

**The application was created by Muladi Péter.**
