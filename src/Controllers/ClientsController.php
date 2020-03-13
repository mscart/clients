<?php

namespace MsCart\Clients\Controllers;

use App\Http\Controllers\Controller;

class ClientsController extends Controller
{

    public function create()
    {
        $this->authorize('clients::role.create');
        return view('clients::create');
    }
}
