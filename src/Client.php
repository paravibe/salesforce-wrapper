<?php

/**
 * @file
 */

namespace Salesforce;

use Salesforce\Core\SalesforceConstants;
use Salesforce\Http\SalesforceRequest;

class Client {

  protected $baseUrl;
  protected $apiPrefix;
  protected $accessToken;

  public function __construct($token, $instanceUrl, $apiVersion) {
    $this->baseUrl = $instanceUrl;
    $this->apiPrefix = $apiVersion ? SalesforceConstants::REST_API_PREFIX . '/' . $apiVersion : SalesforceConstants::REST_API_PREFIX;
    $this->accessToken = $token;
  }

  public function createRequest($requestType, $endpoint) {
    return new SalesforceRequest(
      $requestType,
      $endpoint,
      $this->accessToken,
      $this->baseUrl,
      $this->apiPrefix
    );
  }

  public function query($query) {
    $url = 'queryAll?q=';
    $url .= urlencode($query);

    return new SalesforceRequest(
      'GET',
      $url,
      $this->accessToken,
      $this->baseUrl,
      $this->apiPrefix
    );
  }

  public function url($url) {
    return new SalesforceRequest(
      'GET',
      $url,
      $this->accessToken,
      $this->baseUrl,
      NULL
    );
  }

}
