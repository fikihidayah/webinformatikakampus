<?php

namespace App\Http\Controllers;

use App\Rules\IsOnlyUser;
use App\Models\User;
use App\Rules\MatchPassword;
use App\Rules\StrengthPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function profile()
	{
		$id = auth()->user()->id;
		return view('user.edit', [
			'title' => 'Profile',
			'subtitle' => 'Edit',
			'user'     => User::where('id', $id)->first()
		]);
	}

	public function update_profile(Request $request)
	{
		$rule = [
			'name' => 'required',
			'image' => 'file|max:512|mimes:jpg,png,jpeg'
		];

		// validasi password
		if ($request->password || $request->old_pw || $request->password2) {
			$rule = [
				'old_pw' => new MatchPassword,
				'password' => ['required_with:old_pw|min:8|nullable', new StrengthPassword(8)],
				'password2' => 'required_with:password|same:password',
			];
		}

		// $validation return data yang sudah di validasi
		$validation = $this->validate($request, $rule);

		if ($validation) {
			if ($request->password) {
				$param['password'] = Hash::make($validation['password']);
			}

			if ($file = $request->file('image')) {
				$imgName = $file->getClientOriginalName();
				$file->storeAs('profile-user', $imgName, 'admin');
				$param['image'] = $imgName;
			}

			$param['name'] = $request->name;

			User::where('id', auth()->user()->id)
				->update($param);

			return back()->with('success', 'Berhasil mengubah data profil!');
		}
	}

	public function manage()
	{
		return view('admin.user.manage', [
			'title' => 'User',
			'subtitle' => 'Manajemen',
			'users' => User::all()
		]);
	}

	public function create()
	{
		return view('admin.user.create', [
			'title' => 'User',
			'subtitle' => 'Tambah'
		]);
	}

	public function store(Request $request)
	{
		$rule = [
			'name' => 'required',
			'email' => 'required|email|unique:users',
			'password' => ['required', new StrengthPassword(8)],
			'password2' => 'required_with:password|same:password',
			'image' => 'file|max:512|mimes:jpg,png,jpeg|nullable'
		];


		$validate = $this->validate($request, $rule);
		if ($validate) {
			if ($file = $request->file('image')) {
				$imgName = $file->getClientOriginalName();
				$file->storeAs('profile-user', $imgName, 'admin');
				$validate['image'] = $imgName;
			}

			$validate['password'] = Hash::make($request->getPassword());
			$validate['role_id'] = 2;

			User::create($validate);

			return redirect('/user/manage')->with('success', 'Berhasil menambahkan user');
		}
	}

	public function edit(User $user)
	{
		return view('admin.user.edit', [
			'title' => 'User',
			'sibtitle' => 'Edit',
			'user' => $user
		]);
	}

	public function update(Request $request, User $user)
	{
		$rule = [
			'name' => 'required',
			'email' => ['required', 'email', new IsOnlyUser($user->id)],
			'password' => ['nullable', new StrengthPassword(8)],
			'password2' => 'required_with:password|same:password',
			'image' => 'file|max:512|mimes:jpg,png,jpeg|nullable'
		];

		$validate = $this->validate($request, $rule);

		if ($validate) {
			$userUpdate = User::find($user->id);
			if ($file = $request->file('image')) {
				$oldImage = $user->image;
				$path = public_path('admin/img/profile-user/' . $oldImage);
				if ($oldImage != 'default.png') del_file($path);
				$imgName = $file->getClientOriginalName();
				$file->storeAs('profile-user', $imgName, 'admin');
				$userUpdate->image = $imgName;
			}

			$userUpdate->name = $request->name;
			$userUpdate->email = $request->email;
			if ($request->password) {
				$userUpdate->password = Hash::make($request->password);
			}
			$userUpdate->save();

			return back()->with('success', 'Berhasil mengubah akun user');
		}
	}

	public function reset_image(User $user)
	{
		$oldImage = $user->image;

		$path = public_path('admin/img/profile-user/' . $oldImage);
		if ($oldImage != 'default.png') {
			del_file($path);
			User::find($user->id)->update(['image' => 'default.png']);
			return back()->with('success', 'Berhasil mereset foto profile user');
		}

		return back()->with('error', 'Foto profil user sudah default');
	}

	public function destroy(User $user)
	{
		$oldImage = $user->image;
		$path = public_path('admin/img/profile-user/' . $oldImage);
		if ($oldImage != 'default.png') del_file($path);

		User::destroy($user->id);

		return back()->with('success', 'Berhasil menghapus akun user');
	}
}
