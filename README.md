### K3bycz's Task Manager
**K3bycz's Task Manager** serves as a task manager, aiding in daily life tasks such as daily planning, work, or study organization. The application continuously monitors user progress in tasks and notifies them of approaching deadlines. 
The application supports multiple users simultaneously, ensuring that each user's tasks and notes remain private. Users can create their fully editable user panel and track their task completion progress in a user ranking. 
Additionally, after proper configuration, the application can send SMS and emails.

### Installation
Begin by installing all required packages with the following command:
``` bash
composer install
```

### Database
For the application to function correctly, a database is required (SQLite was used during application testing). 
Create the necessary database, and configure the .env file as follows:
```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
```

Then run the following command to migrate the database:
``` bash
php artisan migrate
```

To ensure proper application functionality, add the following line to the .env file:
```
APP_KEY=
```
Then, execute the command
``` bash
php artisan key:generate
```

### Start the Application:
Once everything is set up, start the application with the following command:
``` bash
php artisan serv
```
or any other command suitable for your environment. Afterward, register and start using the application.
