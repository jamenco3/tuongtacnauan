<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function getList(){
    	$user= User::all();
    	return view('admin.user.list',['user'=>$user]);
    }
    
    public function getAdd(){
    	return view('admin.user.add');
    }

    public function postAdd(Request $request){

    	$this->validate($request,[
    			'name'=>'required|min:3|max:100',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:3|max:32',
                'again_pass'=>'required|same:password',
                'address'=>'required',
                'phone'=>'required|numeric'

	    	],
	    	[
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
	    		'name.required'=>'Bạn chưa nhập họ tên',
	    		'name.min'=>'Tên phải có độ dài từ 3 đến 32 kí tự',
	    		'name.max'=>'Tên phải có độ dài từ 3 đến 32 kí tự',
                'password.min'=>'Mật khẩu phải có độ dài từ 3 kí tự',
                'password.max'=>'Mật khẩu chỉ có tối đa 32 kí tự',
                'again_pass.required'=>'Bạn chưa nhập lại mật khẩu',
                'again_pass.same'=>'Mật khẩu không khớp',
                'address.required'=>'Vui lòng nhập địa chỉ của bạn',
                'phone.required'=>'Vui lòng nhập số điện thoại của bạn để chúng tôi dễ dàng tư vấn',
                'phone.numeric'=>'Số điện thoại không được chứa kí tự khác ngoài số'
	    ]);

	    $user = new User;
	    $user->name = $request->name;
	    $user->fullname = $request->fullname;
        $user->sex = $request->sex;
	    $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        // $user->avatar = $request->avatar;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->level = 10;
        $user->status = 1;
        if($request->hasFile('avatar')){
            $file = $request-> file('avatar');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/user/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('sanpham');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/avatar/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/avatar",$hinh);
            $user->avatar = $hinh;
        }else{
            $user->avatar = "";
        }

	    $user->save();

	    return redirect('admin/user/add')->with('thongbao','Thêm user thành công ');
    }

    public function getEdit($id){
    	$user = User::find($id);
    	return view('admin/user/edit',['user'=>$user]);
    }

    public function postEdit(Request $request,$id){
        // return $request;
    	$user=User::find($id);
    	$this->validate($request,[
                'name'=>'required|min:3|max:100',
                'email'=>'required|email',
                'password'=>'required|min:3|max:32',
                'again_pass'=>'required|same:password',
                'address'=>'required',
                'phone'=>'required|numeric'

            ],
            [
                'email.required'=>'Bạn chưa nhập email',
                'email.email'=>'Bạn chưa nhập đúng định dạng email',
                'name.required'=>'Bạn chưa nhập họ tên',
                'name.min'=>'Tên phải có độ dài từ 3 đến 32 kí tự',
                'name.max'=>'Tên phải có độ dài từ 3 đến 32 kí tự',
                'password.min'=>'Mật khẩu phải có độ dài từ 3 kí tự',
                'password.max'=>'Mật khẩu chỉ có tối đa 32 kí tự',
                'again_pass.required'=>'Bạn chưa nhập lại mật khẩu',
                'again_pass.same'=>'Mật khẩu không khớp',
                'address.required'=>'Vui lòng nhập địa chỉ của bạn',
                'phone.required'=>'Vui lòng nhập số điện thoại của bạn để chúng tôi dễ dàng tư vấn',
                'phone.numeric'=>'Số điện thoại không được chứa kí tự khác ngoài số'
        ]);

        $user->name = $request->name;
        $user->fullname = $request->fullname;
        $user->sex = $request->sex;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        // $user->avatar = $request->avatar;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->level = 1;
        $user->status = 1;
        if($request->hasFile('avatar')){
            $file = $request-> file('avatar');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/user/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('sanpham');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/avatar/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/avatar",$hinh);
            $user->avatar = $hinh;
        }else{
            $user->avatar = "";
        }

        $user->save();

    	return redirect('admin/user/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    // public function getXoa($id){
    // 	$user = User::find($id);

    // 	$user->trangthai = 0;
    // 	$theloai->save();

    // 	return redirect('admin/user/danhsach')->with('thongbao','Bạn đã xóa thành công');
    // }
    
    public function getDelete($id){
    	$user = User::find($id);
    	
    	$user->delete();

    	return redirect('admin/user/list')->with('thongbao','Xóa người dùng thành công');
    }

    public function getDangNhapAdmin(){
        return view('admin.login');
    }

    public function postDangNhapAdmin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập Password',
            'password.min'=>'Password không được nhỏ hơn 3 kí tự',
            'password.max'=>'Passwordư không được quá 32 kí tự'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->isAdmin()) {
                return redirect()->route('trang-chu')->with('thongbao','Bạn đã đăng nhập thành công với tư cách quản trị viên');
            } else {
                return redirect()->route('trang-chu')->with('thongbao', 'Đăng nhập thành công');
            } 
        }else {
            Auth::logout();
            return back()->with('thongbao', 'Tên tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại');
        }
    }

    // public function isAdmin(){
    //     return $this->role == 1 || $this->role == 2|| $this->role == 0;
    // }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect()->route('trang-chu')->with('thongbao','Bạn đã đăng xuất!');
    }

    public function getDangKy(){
        return view('page.register');
    }
    public function postDangKy(Request $request){
        $this->validate($request,[

                'email'=>'required|email|unique:Users,email',
                'password'=>'required|min:6|max:32',
                're_password'=>'required|same:password'
            ],[
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email này đã có người sử dụng',
                'password.required'=>'Vui lòng nhập password',
                'password.min'=>'Mật khẩu phải nhiều hơn 6 kí tự',
                'password.max'=>'Mật khẩu phải ít hơn 32 kí tự',
                're_password.same'=>'Mật khẩu không trùng khớp',
                're_password.required'=>'Bạn chưa nhập lại mật khẩu'
            ]);

        $user = new User();

        $user->name = $request->name;      
        $user->email = $request->email;
        $user->sex = $request->rdoSex;       
        $user->password = Hash::make($request->password);
        $user->level = 1;
        $user->role = 1;
        $user->save();

        return redirect()->back()->with('thanhcong','Đăng ký thành công');
    }
}
