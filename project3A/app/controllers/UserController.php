<?php 

class UserController {
    private $userService;

    public function __construct() {
        $this->userService = callService('User');
    }

    public function index() {
        $username = $_GET['username'] ?? null;
        $user = null;
        if($username) {
            $user = $this->userService->getUserByUsername($username);
        }
        displayView('user/index', [
            'user' => $user,
        ]);
    }

    public function edit() {
        $id = $_SESSION['uid'];
        $user = $this->userService->getUserByEmployeeId($id);
        displayView('user/edit', [
            'user' => $user,
        ]);
    }
}