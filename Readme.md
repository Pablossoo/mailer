The application allows sending emails from the Gmail provider using a simplified form. In case of issues with the email provider, the application will log all errors to var/dev.log.

Warning!
For Gmail's secure settings, it is necessary to enable the "less secure app" option. The application has been tested only with the Gmail provider.

To run the application:

Execute docker-compose build and docker-compose up.
Create a .env.local file and set the required variables.
email_receiver='xxx@xxx.xx' - email address of the receiver.
MAILER_DSN=gmail://email@gmail.com:pass@default
To access the application:

Log in to the Docker container using docker-compose exec --user=root php bash.
Move to the Symfony folder (cd symfony) and run the command composer install.
The application should be accessible at localhost:8003/kontakt.
Tests:

Log in to the Docker container using docker-compose exec --user=root php bash.
Navigate to the Symfony folder (cd symfony/).
Run the command bin/phpunit --coverage-html coverage-dir tests/.
CS Fixer:

From the main folder, run php php-cs-fixer fix /symfony/src, for example.
Rules are stored in .php_cs.





