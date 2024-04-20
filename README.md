# Developer test project - Simple Blog Application with User Authentication

Dear Candidate,

Thank you for your interest in our PHP Developer position. As part of
our evaluation process, we would like you to complete a small test
project to demonstrate your PHP and web development skills. The
project should be completed within 4 days, and your submission
should be a working application with source code. Please use GitHub for source control and commit your code in small chunks.

## Project Description
  
  Create a simple blog application with user authentication using
  PHP. You are free to use any PHP framework or plain PHP for this
  project. The application should include the following features:
  
  
  * User login functionality with secure password storage and user
    authentication.
  * CRUD (Create, Read, Update, Delete) functionality for blog posts.
  * Basic front-end views for displaying blog posts and a user login form
    using HTML, CSS, and JavaScript.
  * Unit tests for critical parts of the application, such as user
    authentication and CRUD operations, using a popular testing framework
    like PHPUnit.
  * Basic documentation, including installation instructions, a
    description of the project's architecture, and any design
    decisions made during the implementation.
  * *Bonus 1:* Set up your project to run in docker.
  * *Bonus 2:* Set up a CI pipeline using GitHub actions, CircleCI or
    GitLab CI/CD.
  * *Bonus 3:* Use E2E testing frameworks such as Cypress
  
## Requirements
  
  * Use Git for version control and provide a link to the repository
    in your submission (Such as GitHub, GitLab).
  * Include a `composer.json` file for managing project dependencies, if
    applicable.
  * Ensure your application is easy to install and run, with clear
    installation instructions provided in the documentation.
  * Make sure your application is well-structured, following best
    practices for PHP and any chosen frameworks or libraries.
  
  Please submit your completed test project within one week. If you have
  any questions or concerns, feel free to reach out to us. We look
  forward to reviewing your submission.

## Project Installation guide
  1. first We need to install docker desktop(https://www.docker.com/products/docker-desktop/) in our system.
  2. Now run some command : 
          ./vendor/bin/sail up -d    // run docker
          ./vendor/bin/sail artisan migrate  //it will create alll necessary table
          npm run build  // create build 
      these command will run docker and create every enviornment
  3. I am putting .env file with automated connection with db 
  
## Project architecture
  1. I used MVC design pattern for the project.
  2. I used docker sail that laravel in built functionality with the help of this I create multiple image in one container like mysql , redis, phpmyadmin
  3. I created test cases in test folder for crud and login , register functionality. please before running test create please make sure create proper connection with sample db in phpunit.xml file