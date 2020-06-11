<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class APIBookController extends Controller
{
  public function index()
  {
    return [
          'success' => true,
          'message' => 'Response successfully returned.',
          'errors' => [],
          'data' => []
      ];
  }
}
