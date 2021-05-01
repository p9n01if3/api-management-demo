<?php

require __DIR__ . "/../vendor/autoload.php";

use Api\GithubApi;

$github_api = new GithubApi();

$user = $github_api->getUser("p9n01if3");
print_r($user);

$users = $github_api->getUsers(73438472, 1);
print_r($users);