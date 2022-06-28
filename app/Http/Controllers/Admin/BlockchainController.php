<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Blockchain\BlockchainService;

class BlockchainController extends Controller
{
    //
    public function index()
    {
        return view('admin.blockchain.list');
    }

    public function addAccount(Request $request)
    {
        $this->validate($request, [
            'account_name' => "required",
            'api_token' => "required",
        ]);

        dd($request->all());
    }
}
