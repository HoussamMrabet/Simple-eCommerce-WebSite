# Ecommerce Web App

This is an ecommerce web application developed using PHP and MySQL, with Bootstrap for the user interface. The application allows visitors to browse products, view individual product descriptions, leave feedback in the comment section, and view seller information. Sellers need to register and await admin confirmation before they can start posting their products for sale. Each product requires admin approval before it is displayed to buyers. The admin has their own interface to manage seller accounts, products, comments, and other aspects of the application.

## Getting Started

To get started with this ecommerce web app, follow the steps below:

### Prerequisites

- PHP (version >= 7.0)
- MySQL (version >= 5.7)
- Web server (e.g., Apache)

### Installation

1. Clone the repository or download the source code.

2. Import the database into your local MySQL server:
   - Locate the database file (`database.sql`) in the project folder.
   - Import the database file into your MySQL server using a tool like phpMyAdmin or the MySQL command line.

3. Configure the database connection:
   - Open the `config.php` file in the project folder.
   - Update the database credentials (hostname, username, password, and database name) to match your local setup.

4. Start the web server:
   - Configure your web server to serve the project folder (e.g., set up a virtual host).
   - Ensure that PHP is properly configured with your web server.

5. Access the application:
   - Open a web browser and navigate to the configured URL for the application.
   - You should now be able to access the ecommerce web app.

## Features

- User Registration:
  - Visitors can register as sellers to post products for sale.
  - Sellers must wait for admin confirmation before they can start posting products.

- Product Listing:
  - Visitors can browse and view a list of available products.
  - Each product has a description page with detailed information.

- Comment Section:
  - Users can leave feedback and comments on product description pages.

- Seller Information:
  - Product descriptions display seller information.

- Admin Interface:
  - The admin has a dedicated interface to manage seller accounts, products, and comments.
  - Admin approval is required for new seller registrations and product postings.

## Contributing

Contributions are welcome! If you'd like to contribute to this ecommerce web app, please follow these steps:

1. Fork the repository.

2. Create a new branch for your feature or bug fix.

3. Make your changes and commit them to your branch.

4. Push your changes to your forked repository.

5. Submit a pull request describing your changes.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

For any inquiries or feedback, please contact [houssammrabet5@gmail.com](mailto:houssammrabet5@gmail.com).
