<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
	{
        $table_data = User::with('shop')->advancedFilter();
        
        return response()
        ->json([
            'model' => $table_data
        ]);
    }
    
    public function create()
	{
		return response()
			->json([
                'form' => User::initialize(),
                'rules' => User::$rules,
                'option' => []
			]);
    }

    public function store(Request $request)
	{
		$name = $request->name;
		$password = $request->password;
        $passwordConfirm = $request->passwordConfirm;
        $shopId = $request->shopId;
        $type = $request->type;

		//password encryption	
		$password = Hash::make($password);

		// save user
		$kelas = User::create($request->except('password','is_active','shop_id') + [
            'password' => $password, 
            'shop_id' => $shopId,
            'type' => $type,
			'is_active' => 1
		]);

		return response()
			->json([
				'saved' => true,
				'message' => 'User ' .$name. ' berhasil ditambah'
			]);
	}
    
    public function edit($id)
	{
		$kelas = User::findOrFail($id);
		
		return response()
            ->json([
                'form' => $kelas,
                'option' => []
            ]);
    }
}
