<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserServiceInterface $service) {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request) {}
}
