<?php

class Routes
{
    private $pageRouts =  [
        'index' => [
            'page' => 'controller/IndexController.php',
            'authorize' => false
        ],
        'security' => [
            'page' => 'controller/SecurityController.php',
            'authorize' => false
        ],
        'registrations' => [
            'page' => 'controller/RegistrationsController.php',
            'authorize' => false
        ],
        'tasks' => [
            'page' => 'controller/TasksController.php',
            'authorize' => true
        ],

        404 => [
            'page' => '404.php'

        ]
    ];

    private $currentController;

    public function __construct()
    {
        $this->currentController = $_REQUEST['controller'] ?? 'index';
    }

    public function loadRoutesPage(): void
    {
        if ($this->pageRouts[$this->currentController] ?? false) {
            require_once $this->pageRouts[$this->currentController]['page'];
        } else {
            require_once $this->pageRouts[404]['page'];
        }
    }

    public function getAccesPage(): bool
    {
        return $this->pageRouts[$this->currentController]['authorize'] ?? false;
    }
}
