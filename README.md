# Tasks Project

This project contains five tasks demonstrating various PHP and Docker-related functionalities, including MySQL integration, XDebug, and Unit Testing.

## Table of Contents
1. [Requirements](#requirements)
2. [Setup and Installation](#setup-and-installation)
3. [Task Descriptions](#task-descriptions)
4. [Testing](#testing)
5. [Technologies Used](#technologies-used)

## Requirements

To run this project, you will need:
- Docker
- Docker Compose
- Composer
- PHP 8.1 or higher

## Setup and Installation

Follow these steps to set up the project:

1. Clone the repository:
    ```bash
    git clone https://github.com/IliyaDovgopol/tasks.git
    ```

2. Navigate to the project directory:
    ```bash
    cd tasks
    ```

3. Build and start the Docker containers:
    ```bash
    docker-compose up --build
    ```

4. The project will be available at `http://localhost` (or another port if configured).

## Task Descriptions

### Task 1: Filter Client Information
- **Description**: Filters a list of clients based on selected fields and displays them in an HTML table.
- **Technologies**: PHP, JSON parsing

### Task 2: Revenue Distribution by Animal
- **Description**: Calculates and displays the distribution of revenue by animal based on milk production for different regions.
- **Technologies**: PHP, MySQL

### Task 3: Filter Timestamps by Date
- **Description**: Filters a list of timestamps to find matches for a target date in the 'America/New_York' timezone.
- **Technologies**: PHP, DateTime

### Task 4: Variant Selection Based on Rate
- **Description**: Randomly selects a variant based on predefined rates using a probabilistic approach.
- **Technologies**: PHP

### Task 5: User Entity with Full Name Method
- **Description**: Implements a User class with a method to return the full name of a user, based on first and last names.
- **Technologies**: JavaScript

## Testing

The project includes unit tests for the PHP tasks using PHPUnit.

To run the tests:

1. Make sure you have Composer installed and the dependencies loaded:
    ```bash
    composer install
    ```

2. Run the tests using PHPUnit:
    ```bash
    vendor/bin/phpunit
    ```

## Technologies Used

- **PHP 8.1**
- **Docker** with Docker Compose
- **XDebug** for debugging
- **PHPUnit** for testing
- **MySQL** for database-related tasks
- **JavaScript** for Task 5 (User entity)