# Mage2 Module Gsoft Login

    ``gsoft/module-login``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Control de login de usuarios

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Gsoft`
 - Enable the module by running `php bin/magento module:enable Gsoft_Login`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require gsoft/module-login`
 - enable the module by running `php bin/magento module:enable Gsoft_Login`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Id Grupo LOCKED (gsoft_login/general/locked_group)


## Specifications

 - Observer
	- customer_login > Gsoft\Login\Observer\Frontend\Customer\Login


## Attributes



