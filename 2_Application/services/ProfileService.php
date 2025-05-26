<?php
require_once __DIR__ . '/../../3_Data/repositories/ProfileRepository.php';

class ProfileService {
    private $repo;

    public function __construct() {
        $this->repo = new ProfileRepository();
    }

    public function getProfile($userID) {
        return $this->repo->getProfile($userID);
    }
}
