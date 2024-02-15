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
    git clone https://github.com/patrickwide/febpos-backend.git
    ```

2. Navigate to the project directory:

    ```bash
    cd febpos-backend
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
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/categories
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Create a Category**

    -   Endpoint: `POST /categories`
    -   Description: Create a new category.
    -   Example:
        ```bash
        curl -X POST -H "Content-Type: application/json" -d '{"category_name": "New Category"}' http://127.0.0.1:8000/api/categories
        ```
    -   Data Expected:
        ```json
        {
            "category_name": "string"
        }
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Get a Category by ID**

    -   Endpoint: `GET /categories/{category}`
    -   Description: Retrieve details of a specific category by its ID.
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/categories/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Update a Category by ID**

    -   Endpoint: `PUT /categories/{category}`
    -   Description: Update details of a specific category by its ID.
    -   Example:
        ```bash
        curl -X PUT -H "Content-Type: application/json" -d '{"category_name": "Updated Category"}' http://127.0.0.1:8000/api/categories/1
        ```
    -   Data Expected:
        ```json
        {
            "category_name": "string"
        }
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Delete a Category by ID**
    -   Endpoint: `DELETE /categories/{category}`
    -   Description: Delete a specific category by its ID.
    -   Example:
        ```bash
        curl -X DELETE http://127.0.0.1:8000/api/categories/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

#### Products

-   **Get All Products**

    -   Endpoint: `GET /products`
    -   Description: Retrieve a list of all products.
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/products
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Create a Product**

    -   Endpoint: `POST /products`
    -   Description: Create a new product.
    -   Example:
        ```bash
        curl -X POST -H "Content-Type: application/json" -d '{"product_name": "New Product", "unit": "kg", "price": 10, "description": "Description", "category_id": 1}' http://127.0.0.1:8000/api/products
        ```
    -   Data Expected:
        ```json
        {
            "product_name": "string",
            "unit": "string",
            "price": "numeric",
            "description": "string",
            "category_id": "integer"
        }
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Get a Product by ID**

    -   Endpoint: `GET /products/{product}`
    -   Description: Retrieve details of a specific product by its ID.
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/products/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Update a Product by ID**

    -   Endpoint: `PUT /products/{product}`
    -   Description: Update details of a specific product by its ID.
    -   Example:
        ```bash
        curl -X PUT -H "Content-Type: application/json" -d '{"product_name": "Updated Product", "unit": "kg", "price": 15, "description": "Updated Description", "category_id": 2}' http://127.0.0.1:8000/api/products/1
        ```
    -   Data Expected:
        ```json
        {
            "product_name": "string",
            "unit": "string",
            "price": "numeric",
            "description": "string",
            "category_id": "integer"
        }
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Delete a Product by ID**
    -   Endpoint: `DELETE /products/{product}`
    -   Description: Delete a specific product by its ID.
    -   Example:
        ```bash
        curl -X DELETE http://127.0.0.1:8000/api/products/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

#### Sales

-   **Get All Sales**

    -   Endpoint: `GET /sales`
    -   Description: Retrieve a list of all sales.
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/sales
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Create a Sale**

    -   Endpoint: `POST /sales`
    -   Description: Record a new sale.
    -   Example:
        ```bash
        curl -X POST -H "Content-Type: application/json" -d '{"vat": true, "discount": 5, "items": [{"product_id": 1, "quantity": 2}, {"product_id": 2, "quantity": 1}]}' http://127.0.0.1:8000/api/sales
        ```
    -   Data Expected:
        ```json
        {
            "vat": "boolean",
            "discount": "numeric",
            "items": [
                {
                    "product_id": "integer",
                    "quantity": "integer"
                },
                ...
            ]
        }
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Get a Sale by ID**

    -   Endpoint: `GET /sales/{sale}`
    -   Description: Retrieve details of a specific sale by its ID.
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/sales/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with

your API URL.

-   **Update a Sale by ID**

    -   Endpoint: `PUT /sales/{sale}`
    -   Description: Update details of a specific sale by its ID.
    -   Example:
        ```bash
        curl -X PUT -H "Content-Type: application/json" -d '{"vat": true, "discount": 10}' http://127.0.0.1:8000/api/sales/1
        ```
    -   Data Expected:
        ```json
        {
            "vat": "boolean",
            "discount": "numeric"
        }
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Delete a Sale by ID**
    -   Endpoint: `DELETE /sales/{sale}`
    -   Description: Delete a specific sale by its ID.
    -   Example:
        ```bash
        curl -X DELETE http://127.0.0.1:8000/api/sales/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

#### Sale Items

-   **Get All Sale Items**

    -   Endpoint: `GET /sale-items`
    -   Description: Retrieve a list of all sale items.
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/sale-items
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Get a Sale Item by ID**

    -   Endpoint: `GET /sale-items/{saleItem}`
    -   Description: Retrieve details of a specific sale item by its ID.
    -   Example:
        ```bash
        curl -X GET http://127.0.0.1:8000/api/sale-items/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Update a Sale Item by ID**

    -   Endpoint: `PUT /sale-items/{saleItem}`
    -   Description: Update details of a specific sale item by its ID.
    -   Example:
        ```bash
        curl -X PUT -H "Content-Type: application/json" -d '{"quantity": 3}' http://127.0.0.1:8000/api/sale-items/1
        ```
    -   Data Expected:
        ```json
        {
            "quantity": "integer"
        }
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

-   **Delete a Sale Item by ID**
    -   Endpoint: `DELETE /sale-items/{saleItem}`
    -   Description: Delete a specific sale item by its ID.
    -   Example:
        ```bash
        curl -X DELETE http://127.0.0.1:8000/api/sale-items/1
        ```
    -   Note: Replace `http://127.0.0.1:8000` with your API URL.

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
