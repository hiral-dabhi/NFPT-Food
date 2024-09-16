<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service\PermissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public $permissionService;
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    public function index(){
        return view("backend.role.index");
    }
}
