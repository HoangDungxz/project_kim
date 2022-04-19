<?php

namespace ADMIN\Controllers;

use SRC\Core\Controller;

class AdminControllers extends Controller
{

    public function __construct()
    {
        $uri =  str_replace(['ADMIN\Controllers\\', 'Controller'], '', get_class($this));
        $uri =  strtolower($uri);
        $this->with($uri);
    }
}
