# Salesforce REST API PHP wrapper

[![Total Downloads](https://img.shields.io/packagist/dt/paravibe/salesforce-wrapper.svg?style=flat-square)](https://packagist.org/packages/paravibe/salesforce-wrapper)

## Installation
`composer require paravibe/salesforce-wrapper`

## How to use

### Initialize client
`$client = new \Salesforce\Client($accessToken, $instanceUrl, $api);`

Where `$accessToken` is a token retrived during authorization procedure - https://developer.salesforce.com/docs/atlas.en-us.api_rest.meta/api_rest/intro_understanding_authentication.htm  
`$instanceUrl` is a string that was returned during authorization procedure  
`$api` is an API version to use. E.g. `v46.0`  

Then you can use any method Salesforce supports by passing it into `createRequest`:

### GET/DELETE methods
```php
$request = $client->createRequest('GET', 'sobjects');
$response = $request->execute()->getDecodedBody();
```
### POST/PATCH methods
```php
$request = $client->createRequest('POST', 'sobjects/SOME_OBJECT');
$request->attachBody(array('field' => 'value'));
$response = $request->execute()->getDecodedBody();
```
