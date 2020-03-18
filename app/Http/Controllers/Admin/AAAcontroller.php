<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AAAcontroller extends Controller

{
    public function BBB()
{
    return redirect('admin.profile.create');
}
}
