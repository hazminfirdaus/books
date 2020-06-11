<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {

      $user = 'Hazmin';
      $age = 27;
      $whatever = 'Slavo';
      $comment = '<script>window.location="http://google.com"</script>';

      // test
      // return 'Hello from HelloWorld';

      // 1.
      // return view('sub.hello-view')
      // ->with('whatever', $user)
      // ->with('age', $age);

      // 2.
      // return view('sub/hello-view', [
      //   'whatever' => $user,
      //   'age' => $age
      // ]);

      // 3.
      // return view('sub.hello-view', [
      //   'whatever' => $user,
      //   'age' => $age
      // ]);

      // 4.
      return view('sub.hello-view', compact('whatever', 'age', 'comment'));
      // the variable name has to match in the hello-view.php

      //can use view('sub/hello-view'); as well
    }
}
