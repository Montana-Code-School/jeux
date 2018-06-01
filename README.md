# b<sup>3</sup>

Game night.
We all love it, we all do it, we all have a special "gamer tag" that defines who we are in that space.
Ever wanted to try out a game to see if it's worth the price or the time? I bet you have. We have the solution for you!
b<sup>3</sup> is a handy site that lets you and your friends share games with one another while allowing you to keep track of who has what. No more wondering where your Friday night specialty has gone! b<sup>3</sup> has you covered!

## Table of Contents

- [Getting Started](#Getting-Started)
- [Running the Tests](#Running-the-Tests)
- [Deployment](#Deployment)
- [What's Inside (Technologies)](#What's-inside-Technologies)
- [Meet the Team](#Meet-the-team)
- [File Structure](#File-Structure)
- [Standards](#Standards)
- [Database](#Database)
- [Deadlines](#Deadlines)
- [User Stories](#User-Story)

## <a name="Getting Started"></a> Getting Started

### Prerequisites
- (L|M)AMP Server   
- PHP >= 7.0.0
- [composer (global installation) ](https://getcomposer.org/doc/00-intro.md#globally)


### Installing
1. Clone the repository.
2. Then run the following from the command line.  

`$ composer install`   
`$ npm install`  
`$ php artisan key:generate`  

### Setting Up the Database
`$ php artisan migrate:refresh`   
`$ php artisan db:seed`

### AND GO!
Make sure your Mamp servers are started and document root is pointed at jeux

`$ npm run watch`
And then visit your localhost!

## <a name="Running the Tests"></a> Running the Tests

### Run Unit Tests  
`$ vendor/bin/phpunit`
### Run Browser Tests  
`$ php artisan dusk`

## <a name="Deployment"></a> Deployment

###  [DigitalOcean](https://www.digitalocean.com/)
We deployed to DigitalOcean.

## <a name=" What's Inside (Technologies)"></a> What's Inside (Technologies)

### Front End
* Laravel
* PHP
* SASS
* OAuth
* Bootstrap
### Back End
* MySQL
* Eloquent
### Testing Gear
* TravisCI
* PHPUnit
* Automated Browser Testing (Dusk)
### Communication
* Github
* Zenhub
* Slack

## <a name="Meet-the-team"></a> Meet the Team

* **Cassidy**
  * Front End Design
  * Specialty Design Work
  * WebGL
  * p5.js Development and Integration
* **Keesha**
  * Routes
  * Back End/Database
  * Git Master
  * Front End Development
* **Kelsey**
  * Testing Architecture
  * Travis CI Integration
  * Automated Browser Testing
  * Front End Development
  * Database Design
* **Kerry**
  * Project Manager
  * Front End Development
* **Matt**
  * Mock ups
  * Automated Unit Testing
  * Deployment
  * Git Master
  * Front End Development
  * Our jack of all trades
* **Nate**
  * Routes
  * Browser Testing
  * Back End/Database
  * Helped on Front End

## <a name="File-Structure"></a> File Structure
```
/jeux
|
|__app
|   |__Console
|   |__Exceptions
|   |__Http
|   |__Notifications
|   |__Providers
|      Game.Php
|      Inventory.php
|      User.php
|__bootstrap
|__config
|__database
|   |__factories
|   |__migrations
|   |__seeds
|__public
|   |__css
|   |__fonts
|   |__images
|   |__js
|__resources
|   |__assets
|   |__lang
|   |__views
|__routes
|__scripts
|__storage
|   |__app
|   |__framework
|   |__logs
|__tests
|   |__Browser
|   |__Feature
|   |__Unit
| dataBaseSpecs.md
| README.md
```
## <a name="Standards"></a> Standards

### Github

* No more than 3 branches
  * main working branch
  * side project branch
  * safety branch
* Branches must have a name of what your are working on (example: n8-bug-fixing(insert error here))
* Pull requests
  * Add a description.
  * Add the Git masters as reviewers.
  * **Do not merge in your own branch to master, must have a new set of eyes merge into master.**

### Code
* Code must be formatted and clean before a merge may be done.

### Due Dates
* If you are unable to get a project done by it's stated due date:
  * Communicate with the project manager.
  * Communicate with the team members working on something similar.
  * Ask for help.

## <a name="Deadlines"></a> Deadlines
  * Thurs. February 1st:
      - Finish documentation and planning.
      - Begin building database.
      - Begin building user view.
  * Thurs. February 8th:
      - Database tables created.
      - Begin populating.
      - Begin Authentication.
  * IM WEEKEND:
      - Testing focus.
      - Frontend development with Laravel, Bootstrap, and paper.js.
      - Connect DB to front.
  * Thurs. February 15th:
      - Continue testing and front end development.
  * Thurs. February 22nd: -HALFWAY POINT-
      - DB connected to Frontend.
      - All views created.
  * Thurs. March 1st:
      - Style frontend.
  * IM WEEKEND:
      - Launch to Digital Ocean.
  * Thurs. March 8th:
      - Add any remaining feasible features.
  * Thurs. March 15th:
      - Finishing touches.
  * Thurs. March 22nd:
      - Project DUE Date.
  * Thurs. March 29th:
      - Presentation practice.
  * Tues. April 3rd:
      - Demo Day!
## <a name="User-Stories"></a> User Stories  

>Name: Winnifred  
Username: Winnie  
Password: password  
Email: winnifred@email.com  

>Name: Peggy  
Username: Pegs  
Password: password  
Email: peggy@email.com
