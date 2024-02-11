# README

This README file provides instructions on how to install the Todo App using Composer and how to run a Docker Compose file to set up a development environment.

## Installing Laravel with Composer

### Prerequisites
Before installing the Todo App, make sure you have the following software installed on your system:
- PHP (Recommended version 8.2 or higher)
- Node
- Composer (Dependency Manager for PHP)

### Steps
1. **Install Composer**: If you haven't already installed Composer, you can download and install it from [https://getcomposer.org/download/](https://getcomposer.org/download/).

2. **Install Todo App**: Open your terminal or command prompt and run the following command to install this project:
    ```
    composer install
    ```
3. **Download Node.js**: Visit the Node.js website and download the latest version of Node.js for your operating system: [https://nodejs.org/en/download/](https://nodejs.org/en/download/).

4. **Install Node.js**: Run the installer you downloaded and follow the on-screen instructions to install Node.js on your system.

5. **Run Development Server**: Change directory to your newly created Laravel project folder and run the following command to start the development server:
    ```
    php artisan serve
    ```
   This will start a development server at `http://localhost:8000` by default.

6. **Accessing Your Application**: Open your web browser and navigate to `http://localhost:8000` to see your Laravel application running.

## Configuring .env File

### Steps
1. **Create .env File**: In the root directory of your Laravel project, locate the `.env.example` file and rename it to `.env`.

2. **Generate Application Key**: Run the following command in your terminal to generate a new application key for your Laravel application:
    ```
    php artisan key:generate
    ```
3. **Configure Database Connection**: Open the `.env` file in a text editor and configure your database connection settings. You'll need to set the `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` variables according to your database setup.

## Running Tailwind

### Steps

1. **Compile Assets**: Run the following command to compile your assets (this might be part of your deployment pipeline):
    ```
    npm run dev
    ```

## Installing Docker Desktop

### Prerequisites
Before installing Docker Desktop, ensure your system meets the minimum requirements specified on the Docker website.

### Steps
1. **Download Docker Desktop**: Visit the Docker website and download Docker Desktop for your operating system: [https://www.docker.com/products/docker-desktop](https://www.docker.com/products/docker-desktop).

2. **Install Docker Desktop**: Run the installer you downloaded and follow the on-screen instructions to install Docker Desktop on your system.

3. **Start Docker Desktop**: Once installed, start Docker Desktop from your applications menu or desktop shortcut.


## Running Docker Compose

### Prerequisites
Before running the Docker Compose file, ensure you have Docker installed on your system.

### Steps
1. **Create a Docker Compose file**: Create a `docker-compose.yml` file in the root directory of your Laravel project or wherever you prefer.

2. **Write Docker Compose Configuration**: Here is the code for the `docker-compose.yml` file:
    ```yaml
    version: "3.9"
    services:
    apache:
    image: php:8.2-apache
    ports:
    - 8080:80
    depends_on:
    - mysql
    mysql:
    image: mariadb:10.8.3
    # Uncomment below when on Mac M1
    # platform: linux/arm64/v8
    command: --default-authentication-plugin=mysql_native_password
    restart: always
    environment:
    MYSQL_ROOT_PASSWORD: root
    ports:
    - 3306:3306
   adminer:
   image: adminer
   restart: always
   ports:
    - 8080:8080
    #  PHP service
    php:
    image: php:8.2-cli
    depends_on:
    - mysql
   ```

3. **Run Docker Compose**: Open your terminal or command prompt, navigate to the directory where your `docker-compose.yml` file is located, and run the following command:
    ```
    docker-compose up 
    ```
   This command will build the necessary images and start the containers in detached mode.

4. **Accessing Your Application**: Once the containers are running, you can access your Laravel application through the configured ports. For example, if you followed the example configuration, you can access your Laravel application at `http://localhost:8080`.

5. **Stopping Containers**: To stop the running containers, run the following command:
    ```
    docker-compose down
    ```
   This command will stop and remove the containers created by Docker Compose.

## Conclusion
By following these instructions, you will have installed the Todo App. Happy Reviewing! 🚀

