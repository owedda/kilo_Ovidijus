# Kilo Akademija Ovidijus Rapalis

## Description
CLI script which will read JSON based data from a specific endpoint via HTTP.
The script contains several sub commands to filter and output the loaded data.

## Technologies
 - PHP 8.15 version;
 - Laravel framework;
 
## Setup

Assuming you've already installed on your machine: PHP
Open terminal in OffersPackage directory and run following command to install dependencies
```
composer install
```
Then after you are done install dependecies with the same command in other two directories (OffersAPI, OffersCLI)

In one terminal launch the server from OffersAPI directory:
```
php artisan serve
```

Now your HTTP request to get all offers is working

```http request
GET /api/offers
```

To change input data go to OffersAPI/resources/offers.json

To see log OffersCLI/my-errors.log

### Examples of use

From OffersCLI directory in terminal launch these sub-commands to try program.

Sub-command to get count of prices that are in selected range.
```
php run.php count_by_price_range {from} {to}
```

Sub-command to get count of vendorId that matches selected vendorId.
```
php run.php count_by_vendor_id {vendorId}
```