<?php

require_once '../src/services/HomeService.php';
require_once '../src/services/ArtworkService.php';

class HomeController
{
    private $homeService;
    private $artworkService;

    public function __construct()
    {
        $this->homeService = new HomeService();
        $this->artworkService = new ArtworkService();
    }

    public function index()
    {
        $content = $this->homeService->getHomeContent();
        $latestArtworks = $this->artworkService->getLastThreeArtworks();

        include '../templates/home.php';
    }
}
