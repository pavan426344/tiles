# Node.js/Express Backend Migration

## Project Overview
This repository contains the migrated backend code, converting the original PHP logic to a modern Node.js and Express application. It is designed to be fully compatible with a React.js frontend, providing a robust and scalable API.

## Prerequisites
*   Node.js (v18+)
*   npm
*   Docker and Docker Compose

## Getting Started

### 1. Environment Setup
Before running the application, you need to set up your environment variables.

1.  Navigate to the `backend` directory:
    ```bash
    cd backend
    ```
2.  Create a `.env` file by copying the example file:
    ```bash
    cp .env.example .env
    ```
3.  Update the `.env` file with your database credentials and a secure JWT secret:
    ```env
    PORT=3000
    DB_HOST=db
    DB_USER=root
    DB_PASSWORD=password
    DB_NAME=tiles
    JWT_SECRET=your_super_secret_key
    ```
    **Note:** When running with Docker, `DB_HOST` should be the name of the database service, which is `db` in the `docker-compose.yml` file.

### 2. Running the Application with Docker (Recommended)
Using Docker is the recommended way to run this application, as it sets up both the Node.js server and the MySQL database in a consistent environment.

1.  **Build and start the services:**
    From the root directory of the project, run:
    ```bash
    docker-compose up -d --build
    ```
2.  **Run Database Migrations:**
    The first time you set up the application, you need to run two migration scripts to prepare the database.

    *   Add the `password` column to the `userlogin` table:
        ```bash
        docker-compose exec backend node scripts/add_password_column.js
        ```
    *   Hash the existing passwords in the database:
        ```bash
        docker-compose exec backend node scripts/hash_passwords.js
        ```
The backend server will be running on `http://localhost:3000`.

## Frontend Integration & Authentication

### CORS
The backend is configured with CORS to allow requests from any origin, which is suitable for development. For production, you should update the CORS configuration in `backend/index.js` to allow only your frontend's domain.

### Authentication Flow
Authentication is handled using JSON Web Tokens (JWT).

1.  **Login:**
    Send a `POST` request to `/api/auth/login` with the user's credentials.
    ```http
    POST /api/auth/login
    Content-Type: application/json

    {
      "username": "testuser",
      "password": "password123"
    }
    ```
2.  **Receive Token:**
    A successful login will return a JWT.
    ```json
    {
      "auth": true,
      "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
    }
    ```
3.  **Store and Send Token:**
    Store this token on the client-side (e.g., in local storage). For all subsequent authenticated requests, include the token in the `Authorization` header.
    ```http
    Authorization: Bearer <your_jwt_token>
    ```

## API Endpoints

### Auth
*   `POST /api/auth/login`: Authenticate a user and receive a JWT.

### Brands
*   `GET /api/brands`: Get all brands.
*   `GET /api/brands/:id`: Get a single brand by ID.
*   `POST /api/brands`: Create a new brand. (Requires `group_master` permission)
*   `PUT /api/brands/:id`: Update a brand. (Requires `group_master` permission)
*   `DELETE /api/brands/:id`: Delete a brand. (Requires `group_master` permission)

### Dealers
*   `GET /api/dealers`: Get all dealers.
*   `GET /api/dealers/:id`: Get a single dealer by ID.
*   `POST /api/dealers`: Create a new dealer. (Requires `dealer_master` permission)
*   `PUT /api/dealers/:id`: Update a dealer. (Requires `dealer_master` permission)
*   `DELETE /api/dealers/:id`: Delete a dealer. (Requires `dealer_master` permission)
*   `PUT /api/dealers/status/:id`: Update a dealer's status. (Requires `dealer_master` permission)
*   `GET /api/dealers/user/:userId`: Get dealers by referring user.
*   `GET /api/dealers/city/:city`: Get dealers by city.
