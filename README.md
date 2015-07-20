# HelloJiraRestApiBundle

[![Latest Stable Version](https://poser.pugx.org/hgtan/jira-rest-api-bundle/v/stable)](https://packagist.org/packages/hgtan/jira-rest-api-bundle)
[![Total Downloads](https://poser.pugx.org/hgtan/jira-rest-api-bundle/downloads)](https://packagist.org/packages/hgtan/jira-rest-api-bundle)
[![Latest Unstable Version](https://poser.pugx.org/hgtan/jira-rest-api-bundle/v/unstable)](https://packagist.org/packages/hgtan/jira-rest-api-bundle)
[![License](https://poser.pugx.org/hgtan/jira-rest-api-bundle/license)](https://packagist.org/packages/hgtan/jira-rest-api-bundle)

[![Build Status](https://img.shields.io/travis/FriendsOfBundle/HelloJiraRestApiBundle.svg?style=flat-square)](https://travis-ci.org/FriendsOfBundle/HelloJiraRestApiBundle)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/FriendsOfBundle/HelloJiraRestApiBundle.svg?style=flat-square)](https://scrutinizer-ci.com/g/FriendsOfBundle/HelloJiraRestApiBundle/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/FriendsOfBundle/HelloJiraRestApiBundle.svg?style=flat-square)](https://scrutinizer-ci.com/g/FriendsOfBundle/HelloJiraRestApiBundle)
[![HHVM Status](https://img.shields.io/hhvm/hgtan/jira-rest-api-bundle.svg?style=flat-square)](http://hhvm.h4cc.de/package/hgtan/jira-rest-api-bundle)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/358d14d2-0e85-4f01-beb8-3a9eb882c438/big.png)](https://insight.sensiolabs.com/projects/358d14d2-0e85-4f01-beb8-3a9eb882c438)

Just a simple example bundle using JIRA REST API PHP Library and the following Bundles:
* [JIRA Rest API for Symfony2](https://github.com/BlueTeaNL/JIRA-Rest-API-Bundle)

Installation
------------

### Step 1: Using Composer

composer.json
```bash
    php composer.phar require hgtan/jira-rest-api-bundle:dev-master
```

### Step 2 : Register the bundle

Then register the bundle with your kernel:

```
    <?php

    // in AppKernel::registerBundles()
    $bundles = array(
        // ...
        new Hgtan\Bundle\HelloJiraRestApiBundle\HgtanHelloJiraRestApiBundle(),
        // ...
    );
```

### Step 3 : Configure the bundle

Then register the bundle with your kernel:

```
    # app/config/config.yml
    bluetea_jira_rest_api:
        api_client: guzzle
        api:
            jira: https://atlassian.domain.com/rest/api/2/
            crowd: https://atlassian.domain.com/crowd/rest/usermanagement/latest/
        authentication:
            jira:
                type: basic # or anonymous
                username: username # mandatory is basic authentication is chosen
                password: password # mandatory is basic authentication is chosen
            crowd:
                type: basic # or anonymous
                username: username # mandatory is basic authentication is chosen
                password: password # mandatory is basic authentication is chosen
```

### Step 4 : Test
```
    $ php app/console server:run
    
```
Example:
```
    -- project
    http://127.0.0.1:8000/project
    http://127.0.0.1:8000/project/10303

    -- user
    http://127.0.0.1:8000/user/admin

    -- issue
    http://127.0.0.1:8000/issue
    http://127.0.0.1:8000/issue/JRA-1

    -- issuetype
    http://127.0.0.1:8000/issuetype
    http://127.0.0.1:8000/issuetype/22

    -- customfield
    http://127.0.0.1:8000/customfield/10115

```