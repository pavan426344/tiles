# Tiles Project

This project consists of a PHP frontend and a Node.js backend. The following instructions will guide you through setting up and running the project locally.

## Prerequisites

- Docker and Docker Compose
- A modern web browser

## How to Run the Project

1.  **Clone the repository.**

2.  **Set up the environment variables:**
    -   Navigate to the `backend` directory.
    -   Create a copy of the `.env.example` file and name it `.env`.
    -   Review the variables in the `.env` file and make any necessary changes. The default values should work for a local setup.

3.  **Start the application:**
    -   Open a terminal in the root directory of the project.
    -   Run the following command to start the backend and database containers:
        ```bash
        sudo docker compose up -d
        ```

4.  **Set up the database:**
    -   The first time you start the application, you will need to set up the database. Run the following commands in the root directory of the project:
        ```bash
        sudo docker exec -i app-db-1 mysql -uroot -ppassword -e "CREATE DATABASE IF NOT EXISTS tiles;"
        sudo docker exec -i app-db-1 mysql -uroot -ppassword tiles < nilongro_swastik.sql
        sudo docker compose exec backend node scripts/add_password_column.js
        sudo docker compose exec backend node scripts/hash_passwords.js
        ```

5.  **Start the PHP frontend:**
    -   Run the following command in the root directory of the project to start the PHP development server:
        ```bash
        php -S 0.0.0.0:8080 > php.log 2>&1 &
        ```

6.  **Access the application:**
    -   Open your web browser and navigate to `http://localhost:8080`.

## Stopping the Application

To stop the application, run the following command in the root directory of the project:

```bash
sudo docker compose down
```
