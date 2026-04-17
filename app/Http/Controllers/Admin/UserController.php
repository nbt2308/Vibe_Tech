<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $status = $request->status;
        $userTypeFilter = $request->user_type;
        $perPage = $request->per_page ?? 5;
        $query = User::query()->where('user_type', 1);

        if (!empty($keyword)) {
            $query->where('name', 'LIKE', '%' . $keyword . '%')
                ->orWhere('email', 'LIKE', '%' . $keyword . '%');
        }
        if ($request->has('status') && $status !== null && $status !== '') {
            $query->where('status', $status);
        }
        if ($request->has('user_type') && $userTypeFilter !== null && $userTypeFilter !== '') {
            $query->where('user_type', $userTypeFilter);
        }
        $users = $query->latest()
            ->paginate($perPage)
            ->withQueryString();
        //tổng người dùng
        $user_total = User::count();
        //tổng admin
        $user_admin = User::where('user_type', 1)->count();
        //tổng nhân viên
        $user_staff = User::where('user_type', 0)->count();
        //user còn hoạt động
        $user_status_true = User::where('user_type', 1)->where('status', 1)->count();
        //user ngưng hoạt động
        $user_status_false = User::where('user_type', 1)->where('status', 0)->count();  
        return view("admin.users.index", compact("users", "user_total", "user_admin", "user_staff", "user_status_true", "user_status_false"));
    }

    public function store(UserRequest $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "phone" => $request->phone,
            "address" => $request->address,
            "user_type" => 1,
            "status" => $request->status,
        ]);
        return redirect()->back()->with('success', 'Thêm người dùng mới thành công');

    }

    public function edit($id)
    {

        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }
    public function Update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            "name" => $request->name,
            "phone" => $request->phone,
            "address" => $request->address,
            "status" => $request->status,
        ]);
        return redirect()->back()->with('success', 'Cập nhật người dùng mới thành công');

    }

    public function delete($id)
    {
        $user = User::find($id);
        return view('admin.users.delete', compact('user'));
    }
    public function destroy($id)
    {
        try {
            //check người dùng hiện tại
            $user = User::findOrFail($id);
            if ($user->id === auth()->id()) {
                return redirect()->back()->with('error', 'Bạn không thể tự xóa tài khoản của chính mình!');
            }
            return redirect()->back()->with('success', 'Xóa người dùng thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa người dùng: ' . $e->getMessage());
        }
    }

}
