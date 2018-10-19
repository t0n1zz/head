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

    public function update(Request $request, $id)
	{
		$kelas = User::findOrFail($id);

		$name = $kelas->name;

		$kelas->update($request->all());

		return response()
			->json([
				'saved' => true,
				'message' => 'User ' .$name. ' berhasil diubah'
			]);
	}

    public function updateStatus($id)
	{
		$kelas = User::findOrFail($id);

		$name = $kelas->name;

		if($kelas->is_active == 1){
			$kelas->is_active = 0;
			$message = 'User ' .$name. ' berhasil dinon-aktifkan';
		}else{
			$kelas->is_active = 1;
			$message = 'User ' .$name. ' berhasil diaktifkan';
		}

		$kelas->update();

		return response()
			->json([
				'saved' => true,
				'message' => $message
			]);
    }
    
    public function updatePassword(Request $request, $id)
	{
		$kelas = User::findOrFail($id);

		if (!Hash::check(request('password_old'), $kelas->password)) {
				return response()->json([
						'message' => 'Password lama anda salah',
						'status' => 500
				], 500);
		}

		if (Hash::check(request('password'), $kelas->password)) {
			return response()->json([
					'message' => 'Password baru tidak boleh sama dengan yang lama',
					'status' => 500
			], 500);
		}
	
		$password = $request->password;
		$password = Hash::make($password);

		$name = $kelas->name;

		$kelas->password = $password;
		$kelas->update();

		return response()
			->json([
				'saved' => true,
				'message' => 'Password user ' .$name. ' telah berhasil diubah'
			]);
    }
    
    public function updateResetPassword($id)
	{
		$kelas = User::findOrFail($id);
		$password = env('RESET_PASSWORD');
		$password = Hash::make($password);

		$name = $kelas->name;

		$kelas->password = $password;
		$kelas->update();

		return response()
			->json([
				'saved' => true,
				'message' => 'Password user ' .$name. ' telah berhasil direset'
			]);
    }
    
    public function destroy($id)
	{
		$kelas = User::findOrFail($id);
		$name = $kelas->name;

		$kelas->delete();

		return response()
			->json([
				'deleted' => true,
				'message' => $this->message. ' ' .$name. 'berhasil dihapus'
			]);
	}
}
