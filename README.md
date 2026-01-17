# Node.js/Express Backend Migration

## Project Overview
This repository contains the migrated backend code, converting the original PHP logic to Node.js with Express. It preserves all API endpoints to ensure full compatibility with the existing frontend.

## Prerequisites
* Node.js (v18+)
* npm or yarn
* Docker and Docker Compose

## Installation

1.  **Clone the repository:**
    ```bash
    git clone [repo_url]
    cd [project_name]
    ```

2.  **Environment Setup:**
    Create a `.env` file in the `backend` directory:
    ```env
    PORT=3000
    DB_HOST=localhost
    DB_USER=root
    DB_PASS=password
    DB_NAME=database_name
    JWT_SECRET=your_secret_key
    ```

## Running the Application (without Docker)

* **Navigate to the `backend` directory:** `cd backend`
* **Install dependencies:** `npm install`
* **Development:** `npm run dev`
* **Production:** `npm start`

## Running the Application (with Docker)

1.  **Build and run the containers:**
    ```bash
    docker-compose up -d
    ```

## Database Migration

After running the application for the first time, you need to run the database migration scripts to update the database schema and hash the existing passwords.

1.  **Run the `add_password_column.js` script:**
    ```bash
    docker-compose exec backend node scripts/add_password_column.js
    ```

2.  **Run the `hash_passwords.js` script:**
    ```bash
    docker-compose exec backend node scripts/hash_passwords.js
    ```

## API Documentation
All endpoints mirror the original PHP backend. No frontend changes are required.
