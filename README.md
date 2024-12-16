# Cornershop - Fullstack E-commerce Application

## Table of Contents
1. [Objective](#objective)
2. [Key Features](#key-features)
3. [Technologies Used](#technologies-used)
4. [Project Architecture](#project-architecture)
5. [Setup and Installation](#setup-and-installation)
    - [Backend Setup](#backend-setup)
    - [Frontend Setup](#frontend-setup)
    - [Database Configuration](#database-configuration)
    - [Redis Configuration](#redis-configuration)
6. [Running Locally](#running-locally)
7. [Testing](#testing)
8. [Deployment](#deployment)
    - [Dockerization](#dockerization)
    - [CI/CD Pipeline](#ci-cd-pipeline)
    - [Deployment to DigitalOcean](#deployment-to-digitalocean)
9. [API Documentation](#api-documentation)
10. [Screenshots](#screenshots)
11. [License](#license)

---

## Objective
Cornershop is a fullstack e-commerce application designed to showcase core functionalities for managing an online store. This project demonstrates the ability to implement robust cart functionality, order management, and deployment pipelines while adhering to modern development practices.

## Key Features
### Backend
- **Cart Functionality:** Utilizes Redis to store cart items for optimized performance.
- **Order Management:** Stores orders in a MySQL/PostgreSQL database.
- **Error Handling:** Implements clear error messages and HTTP status codes.
- **Testing:** Comprehensive test coverage for core features.

### Frontend
- **User Interface:** Clean and intuitive styling for easy navigation.
- **Frameworks:** Flexible to use React or Vue.js for enhanced interactivity (optional).

### Deployment
- **Dockerized Application:** Simplifies setup and deployment.
- **CI/CD Pipelines:** Automates testing and deployment processes using GitHub Actions.
- **DigitalOcean Deployment:** Deployed to DigitalOcean with SSH authorization.

### Required User Flow
1. View available products.
2. Add and remove products from the cart.
3. Place an order.
4. View orders.

## Technologies Used
- **Backend:** Laravel 11
- **Frontend:** HTML, CSS, (React/Vue optional)
- **Database:** MySQL or PostgreSQL
- **Caching:** Redis
- **Deployment:** Docker, GitHub Actions, DigitalOcean

## Project Architecture
```plaintext
Cornershop/
├── backend/
│   ├── app/
│   ├── config/
│   ├── database/
│   └── tests/
├── frontend/
│   ├── public/
│   ├── src/
│   └── package.json
├── docker-compose.yml
├── README.md
└── .github/
    └── workflows/
```

## Setup and Installation
### Backend Setup
1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/cornershop.git
   cd cornershop/backend
   ```
2. Install dependencies:
   ```bash
   composer install
   ```
3. Set up the `.env` file:
   ```plaintext
   APP_NAME="Cornershop"
   APP_ENV=local
   APP_KEY=base64:YourKeyHere
   APP_DEBUG=true
   APP_URL=http://localhost

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=cornershop
   DB_USERNAME=root
   DB_PASSWORD=

   REDIS_HOST=127.0.0.1
   REDIS_PASSWORD=null
   REDIS_PORT=6379
   ```
4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

### Frontend Setup
1. Navigate to the `frontend` directory:
   ```bash
   cd ../frontend
   ```
2. Install dependencies:
   ```bash
   npm install
   ```
3. Start the development server:
   ```bash
   npm run dev
   ```

### Database Configuration
1. Ensure MySQL/PostgreSQL is installed and running.
2. Run migrations:
   ```bash
   php artisan migrate
   ```

### Redis Configuration
1. Install Redis locally or via Docker:
   ```bash
   docker run -d -p 6379:6379 redis
   ```
2. Verify connection in `.env` file.

## Running Locally
1. Start the Laravel backend:
   ```bash
   php artisan serve
   ```
2. Access the application at `http://localhost:8000`.

## Testing
Run tests for the backend:
```bash
php artisan test
```

## Deployment
### Dockerization
1. Build and run the Docker containers:
   ```bash
   docker-compose up --build
   ```
2. Access the application at `http://localhost`.

### CI/CD Pipeline
1. Set up GitHub Actions workflow in `.github/workflows/` directory.
2. Ensure proper testing and deployment scripts are included.

### Deployment to DigitalOcean
1. Set up a droplet on DigitalOcean.
2. Install Docker and Docker Compose.
3. Clone the repository and run the application:
   ```bash
   git clone https://github.com/yourusername/cornershop.git
   cd cornershop
   docker-compose up -d
   ```

## API Documentation
API endpoints include:
- **GET** `/api/products` - View all products
- **POST** `/api/cart` - Add item to cart
- **DELETE** `/api/cart/{id}` - Remove item from cart
- **POST** `/api/order` - Place an order
- **GET** `/api/orders` - View all orders

## Screenshots
**Home Page:**
![Home Page](https://via.placeholder.com/800x400 "Home Page")

**Cart Page:**
![Cart Page](https://via.placeholder.com/800x400 "Cart Page")

**Order Page:**
![Order Page](https://via.placeholder.com/800x400 "Order Page")

## License
This project is licensed under the [MIT License](LICENSE).