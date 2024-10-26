<?php

require_once '../src/services/ArtworkService.php';
require_once '../src/services/HomeService.php';

class OeuvreController
{
    private $artworkService;
    private $homeService;

    public function __construct()
    {
        $this->artworkService = new ArtworkService();
        $this->homeService = new HomeService();
    }

    public function index()
    {
        $latestArtworks = $this->artworkService->getLastThreeArtworks();
        $content = $this->homeService->getHomeContent();

        $artworkId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        $selectedArtwork = $this->artworkService->getArtworkById($artworkId);

        include '../templates/artwork.php';
    }
}
