<?php 

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class HealthController extends ResourceController
{
    public function index()
    {
        return $this ->respond([
            'status' => 'success',
            'message' => 'API is healthy'
        ]);
    }
}