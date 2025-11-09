# CarsTutorial# Cars Tutorial

## Description

This project is a Symfony application for managing a car rental system. It allows users to add, edit, delete, and view cars along with their details.

## Features

- Add new cars to the inventory
- Edit existing car details
- Delete cars from the inventory
- View a list of all cars with their details

## Requirements

- PHP 8.0 or higher
- Symfony 5.0 or higher
- Composer
- A database (e.g., MySQL, SQLite)

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/WadiiZouaghi/CarsTutorial.git
   ```

2. Navigate to the project directory:

   ```bash
   cd CarsTutorial
   ```

3. Install the dependencies:

   ```bash
   composer install
   ```

4. Set up your database configuration in the `.env` file.

5. Create the database:

   ```bash
   php bin/console doctrine:database:create
   ```

6. Run migrations (if any):

   ```bash
   php bin/console doctrine:migrations:migrate
   ```

7. Start the Symfony server:

   ```bash
   symfony server:start
   ```

8. Access the application at `http://127.0.0.1:8000`.

## Usage

- To add a new car, navigate to the "Add Car" page.
- To edit or delete a car, use the actions available in the car list.

## Contributing

Feel free to fork the repository and submit pull requests for any improvements or features.

## License

This project is licensed under the MIT License.