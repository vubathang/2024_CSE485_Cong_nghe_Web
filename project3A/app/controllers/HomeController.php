<?php 

class HomeController {
    private $userService;
    private $employeeService;
    private $departmentService;

    public function __construct() {
        $this->userService = callService('User');
        $this->employeeService = callService('Employee');
        $this->departmentService = callService('Department');
    }

    public function index() {
        global $news, $events, $specialFeatures, $colSearch;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $colId = $_POST['field-search'];
            $value = $_POST['search-value'];
            $this->search($colId, $value);
        } else {
            displayView('home/index', [
                'news' => $news,
                'events' => $events,
                'specialFeatures' => $specialFeatures,
                'colSearch' => $colSearch
            ]);
        }
    }

    public function search($colId, $value) {
        global $news, $events, $specialFeatures, $colSearch;
        if($colSearch[$colId]['tableName'] == 'departments') {
            displayView('department/index', [
                'departments' => $this->departmentService->search($value, $colSearch[$colId]['colName'])
            ]);
        } else if($colSearch[$colId]['tableName'] == 'employees') {
            displayView('employee/index', [
                'employees' => $this->employeeService->search($value, $colSearch[$colId]['colName'])
            ]);
        } else {
            displayView('home/index', [
                'news' => $news,
                'events' => $events,
                'specialFeatures' => $specialFeatures,
                'colSearch' => $colSearch
            ]);
        }
    }
}