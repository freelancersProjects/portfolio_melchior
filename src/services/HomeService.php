<?php

require_once '../src/models/Portfolio.php';

class HomeService
{
    private $portfolio;

    public function __construct()
    {
        $this->portfolio = new Portfolio();
    }

    public function getHomeContent()
    {
        return $this->portfolio->getAllContent();
    }
}
