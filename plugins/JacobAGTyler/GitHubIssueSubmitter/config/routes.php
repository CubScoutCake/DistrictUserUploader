<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'JacobAGTyler/GitHubIssueSubmitter',
    ['path' => '/jacob-a-g-tyler/git-hub-issue-submitter'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);
