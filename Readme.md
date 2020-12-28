## Description 

Application allow to sent email from gmail provider using short form. 
While occurring problems with email provider, application will log all errors to var/dev.log

####warning! 

* In gmail secure setting we have to set option "less secure app"
* Application has been testes only for gmail provider.
 
### Run application 
* run docker-compose build & docker-compose up
* create .env.local and set needed variables
  * email_receiver='xxx@xxx.xx' - address email to receiver
  * MAILER_DSN= gmail://email@gmail.com:pass@default
* now go to localhost:8003/kontakt and have fun    

### Tests 

login to docker container 
 * docker-compose exec php bash
 * cd symfony/
 * run bin/phpunit --coverage-html coverage-dir src/ - or tests/ for example


### Cs fixer

* from main folder run, php php-cs-fixer fix /symfony/src for example 
* rules are stored in .php_cs


