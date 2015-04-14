Wizardry
========================

##Welcome to the MTG card catalog


More information about MTG(Magic: The Gathering) on [Wikipedia](http://en.wikipedia.org/wiki/Magic:_The_Gathering).


##Installation
------------
Before installation be sure that you have Symfony2 installed and configured. If not, follow the instructions:
http://symfony.com/doc/current/book/installation.html

If you want to install the project, you have to follow next steps:

     Clone the repo git clone
    1. git clone -b develop https://github.com/geekhub-php/wizardry.git

     Go to the project root
    2. cd wizardry

     Install dependencies, run
    3. composer install
    (If you do not yet have composer, install it)
    curl -sS https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer

     And run the reload
    4. php app/reload.php

    ...

    Also you can parse content from official resourse (http://magiccardrs.info/sitemap.html)
    1) php app/console parse:sitemap --lang="en"
    Available --lang="en" option for English locale and "ru" for Russian.
    2) php app/console parse:card
    Parsed data will be saved to src/Wizardry/MainBundle/DataFixtures/MongoDB/parsed_cards.yml
    3) Load it from fixtures changing src/Wizardry/MainBundle/DataFixtures/MongoDB/LoadCardData.php
    at line 16 "__DIR__.'/fixtures.yml'," to "__DIR__.'/parsed_cards.yml'," and run 
    php app/console doctrine:mongodb:fixtures:load


Congratulation! You've done it successfully!

##Api documentation
------------

http://wizardry.local/api/doc/



##Bug tracking
------------

Wizardry uses [GitHub issues](https://github.com/geekhub-php/wizardry/issues).
If you have found bug, please create an issue.

##Authors
-------

Wizardry was originally created by [Geekhub Project Team](http://geekhub.ck.ua).

[1]:  http://geekhub.ck.ua/


