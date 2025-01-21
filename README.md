# PHP Application with Docker

This is a PHP application using PHPUnit for testing. Follow the steps below to set up and run the application using Docker.

## Prerequisites

- Docker
- Docker Compose
- Git

## Installation Steps

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd <project-directory>
   ```

2. Build and start the containers:
   ```bash
   docker-compose up -d --build
   ```

3. Install PHP dependencies:
   ```bash
   docker-compose exec app composer install
   ```

## Project Structure
├── app/
│ ├── src/
│ └── tests/
├── docker/
│ ├── nginx/
│ └── php/
├── docker-compose.yml
├── composer.json
└── README.md
```

## Running Tests

Execute PHPUnit tests using:
```bash
docker-compose exec app vendor/bin/phpunit
```

## Development

- The application will be available at: `http://localhost:8080`
- PHP files should be placed in the `app/src` directory
- Tests should be placed in the `app/tests` directory

## Docker Services

- **PHP-FPM**: PHP application server
- **Nginx**: Web server
- **MySQL**: Database server (if applicable)

## Commands

```bash
# Start containers
docker-compose up -d

# Stop containers
docker-compose down

# View logs
docker-compose logs -f

# Access PHP container shell
docker-compose exec app bash
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please open an issue in the repository's issue tracker.