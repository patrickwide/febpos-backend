# Laravel POS System

A simple Point of Sale (POS) system built with Laravel for managing products, categories, sales, and sale items.

## Table of Contents

-   [Features](#features)
-   [Requirements](#requirements)
-   [Getting Started](#getting-started)
    -   [Installation](#installation)
    -   [Database Setup](#database-setup)
    -   [Running Migrations](#running-migrations)
    -   [API Endpoints](#api-endpoints)
-   [Usage](#usage)
-   [Contributing](#contributing)
-   [License](#license)

## Features

-   Manage products and categories
-   Record sales and sale items
-   API endpoints for interacting with the system

## Requirements

-   PHP >= 7.4
-   Composer
-   MySQL or any other supported database
-   Node.js and npm (for frontend development, if applicable)

## Getting Started

### Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/laravel-pos-system.git
    ```

2. Navigate to the project directory:

    ```bash
    cd laravel-pos-system
    ```

3. Install dependencies:

    ```bash
    composer install
    ```

### Database Setup

1. Create a new MySQL database for the POS system.

2. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

3. Update the database configuration in the `.env` file with your database credentials:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=your-database-host
    DB_PORT=your-database-port
    DB_DATABASE=your-database-name
    DB_USERNAME=your-database-username
    DB_PASSWORD=your-database-password
    ```

### Running Migrations

Run the database migrations to create the necessary tables:

```bash
php artisan migrate
```

### API Endpoints

Here are the available API endpoints for managing categories, products, sales, and sale items:

#### Categories

-   **Get All Categories**

    -   Endpoint: `GET /categories`
    -   Description: Retrieve a list of all categories.

-   **Create a Category**

    -   Endpoint: `POST /categories`
    -   Description: Create a new category.

-   **Get a Category by ID**

    -   Endpoint: `GET /categories/{category}`
    -   Description: Retrieve details of a specific category by its ID.

-   **Update a Category by ID**

    -   Endpoint: `PUT /categories/{category}`
    -   Description: Update details of a specific category by its ID.

-   **Delete a Category by ID**
    -   Endpoint: `DELETE /categories/{category}`
    -   Description: Delete a specific category by its ID.

#### Products

-   **Get All Products**

    -   Endpoint: `GET /products`
    -   Description: Retrieve a list of all products.

-   **Create a Product**

    -   Endpoint: `POST /products`
    -   Description: Create a new product.

-   **Get a Product by ID**

    -   Endpoint: `GET /products/{product}`
    -   Description: Retrieve details of a specific product by its ID.

-   **Update a Product by ID**

    -   Endpoint: `PUT /products/{product}`
    -   Description: Update details of a specific product by its ID.

-   **Delete a Product by ID**
    -   Endpoint: `DELETE /products/{product}`
    -   Description: Delete a specific product by its ID.

#### Sales

-   **Get All Sales**

    -   Endpoint: `GET /sales`
    -   Description: Retrieve a list of all sales.

-   **Create a Sale**

    -   Endpoint: `POST /sales`
    -   Description: Record a new sale.

-   **Get a Sale by ID**

    -   Endpoint: `GET /sales/{sale}`
    -   Description: Retrieve details of a specific sale by its ID.

-   **Update a Sale by ID**

    -   Endpoint: `PUT /sales/{sale}`
    -   Description: Update details of a specific sale by its ID.

-   **Delete a Sale by ID**
    -   Endpoint: `DELETE /sales/{sale}`
    -   Description: Delete a specific sale by its ID.

#### Sale Items

-   **Get All Sale Items**

    -   Endpoint: `GET /sale-items`
    -   Description: Retrieve a list of all sale items.

-   **Create a Sale Item**

    -   Endpoint: `POST /sale-items`
    -   Description: Record a new sale item.

-   **Get a Sale Item by ID**

    -   Endpoint: `GET /sale-items/{saleItem}`
    -   Description: Retrieve details of a specific sale item by its ID.

-   **Update a Sale Item by ID**

    -   Endpoint: `PUT /sale-items/{saleItem}`
    -   Description: Update details of a specific sale item by its ID.

-   **Delete a Sale Item by ID**
    -   Endpoint: `DELETE /sale-items/{saleItem}`
    -   Description: Delete a specific sale item by its ID.

## Usage

1. Start the development server:

    ```bash
    php artisan serve
    ```

2. Access the application at [http://localhost:8000](http://localhost:8000).

3. Use the provided API endpoints for interacting with the system.

## Contributing

Contributions are welcome! Feel free to open issues or pull requests.

## License

This project is provided as-is without any explicit license. It is a public project on the internet, and you are free to use, modify, and distribute the code at your own risk. There are no warranties or guarantees associated with this project.

If you have any questions or concerns, feel free to contact the project owner via email at `patrickwide254@gmail.com`
