<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Dish;
use App\Recipes;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function getList(){
    	// $recipes = Recipes::orderBy('id','DESC')->paginate(5,['*'],'page1');
        $recipes = Recipes::all();
        return view('admin.recipes.list',['recipes'=>$recipes]);
    }

    public function getAdd(){
        $category = Category::where('status',1)->get();
        $dish = Dish::where('status',1)->get();
    	return view('admin.recipes.add',['category'=>$category,'dish'=>$dish]);
    }

     public function postAdd(Request $request){

        $this->validate($request,[
                'dish'=>'required',
                'name'=>'required|min:3|max:100|unique:Recipes,name',
                'step_1'=>'required',
                'step_2'=>'required',
                'step_3'=>'required',              
                'amount'=>'required|numeric',
                'materials'=>'required',
                'eater'=>'required|numeric',
                'time'=>'required|numeric'
            ],
            [
                'dish.required'=>'Bạn chưa chọn món ăn',
                'name.required'=>'Bạn chưa nhập tên công thức',              
                'step_1.required'=>'Bạn chưa nhập bước 1',
                'step_2.required'=>'Bạn chưa nhập bước 2',
                'step_3.required'=>'Bạn chưa nhập bước 3',
                'name.unique'=>'Tên công thức đã tồn tại',
                'name.min'=>'Tên công thức phải có độ dài từ 3 đến 100 kí tự',
                'name.max'=>'Tên công thức phải có độ dài từ 3 đến 100 kí tự',
                'amount.required'=>'Bạn chưa nhập sô lượng nguyên liệu',
                'amount.numeric'=>'Số lượng phải là kiểu số',
                'materials.required'=>'Bạn chưa nhập các nguyên liệu',
                'eater.required'=>'Bạn chưa nhập số người ăn',
                'eater.numeric'=>'Số người ăn phải là kiểu số',
                'time.required'=>'Bạn chưa nhập thời gian thực hiện nấu',
                'time.numeric'=>'Thời gian phải là kiểu số',
        ]);

        $recipes = new Recipes;
        $recipes->name = $request->name;        
        $recipes->id_dish = $request->dish; // lấy tên món ăn
        $recipes->step_1 = $request->step_1;// bước 1
        $recipes->step_2 = $request->step_2;// bước 2
        $recipes->step_3 = $request->step_3;// bước 3
        $recipes->id_user = Auth::user()->id;
        //bước 4 nếu có
        if($request->step_4 == "")
            $recipes->step_4 = "";
        else
            $recipes->step_4 = $request->step_4;
        //bước 5 nếu có
        if($request->step_5 == "")
            $recipes->step_5 = "";
        else
            $recipes->step_5 = $request->step_5;
        //bước 6 nếu có
        if($request->step_6 == "")
            $recipes->step_6= "";
        else
            $recipes->step_6 = $request->step_6;

        // hình bước 1
        if($request->hasFile('image_1')){
            $file = $request-> file('image_1');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_1 = $hinh;
        }else{
            $recipes->image_1 = "";
        }
        // hình bước 2
        if($request->hasFile('image_2')){
            $file = $request-> file('image_2');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_2 = $hinh;
        }else{
            $recipes->image_2 = "";
        }
        // hình bước 3
        if($request->hasFile('image_3')){
            $file = $request-> file('image_3');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_3 = $hinh;
        }else{
            $recipes->image_3 = "";
        }
        // hình bước 4
        if($request->hasFile('image_4')){
            $file = $request-> file('image_4');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_4 = $hinh;
        }else{
            $recipes->image_4 = "";
        }
        // hình bước 5
        if($request->hasFile('image_5')){
            $file = $request-> file('image_5');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_5 = $hinh;
        }else{
            $recipes->image_5 = "";
        }
        // hình bước 6
        if($request->hasFile('image_6')){
            $file = $request-> file('image_6');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('sanpham');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_6= $hinh;
        }else{
            $recipes->image_6 = "";
        }
        $recipes->level = $request->level;
        $recipes->amount = $request->amount; // số nguyên liệu
        $recipes->materials = $request->materials; // các nguyên liệu
        $recipes->eater = $request->eater; // số người ăn
        $recipes->time = $request->time; // thời gian thực hiện
        $recipes->status = 1; // trạng thái
        $recipes->save();

        return redirect('admin/recipes/add')->with('thongbao','Bạn đã thêm thành công! ');
    }

    public function getEdit($id){
        // $comment = Comment::all();
        $category = Category::all();
        $dish = Dish::all();
        $recipes = Recipes::find($id);
        return view('admin/recipes/edit',['recipes'=>$recipes,'category'=>$category,'dish'=>$dish]);
    }

    public function postEdit(Request $request,$id){

        $recipes=Recipes::find($id);

        $this->validate($request,[
                'dish'=>'required',
                'name'=>'required|min:3|max:100',
                'step_1'=>'required',
                'step_2'=>'required',
                'step_3'=>'required',              
                'amount'=>'required|numeric',
                'materials'=>'required',
                'eater'=>'required|numeric',
                'time'=>'required|numeric'
            ],
            [
                'dish.required'=>'Bạn chưa chọn món ăn',
                'name.required'=>'Bạn chưa nhập tên công thức',              
                'step_1.required'=>'Bạn chưa nhập bước 1',
                'step_2.required'=>'Bạn chưa nhập bước 2',
                'step_3.required'=>'Bạn chưa nhập bước 3',
                // 'name.unique'=>'Tên công thức đã tồn tại',
                'name.min'=>'Tên công thức phải có độ dài từ 3 đến 100 kí tự',
                'name.max'=>'Tên công thức phải có độ dài từ 3 đến 100 kí tự',
                'amount.required'=>'Bạn chưa nhập sô lượng nguyên liệu',
                'amount.numeric'=>'Số lượng phải là kiểu số',
                'materials.required'=>'Bạn chưa nhập các nguyên liệu',
                'eater.required'=>'Bạn chưa nhập số người ăn',
                'eater.numeric'=>'Số người ăn phải là kiểu số',
                'time.required'=>'Bạn chưa nhập thời gian thực hiện nấu',
                'time.numeric'=>'Thời gian phải là kiểu số',
        ]);

       
        $recipes->name = $request->name;        
        $recipes->id_dish = $request->dish; // lấy tên món ăn
        $recipes->step_1 = $request->step_1;// bước 1
        $recipes->step_2 = $request->step_2;// bước 2
        $recipes->step_3 = $request->step_3;// bước 3
        $recipes->id_user = Auth::user()->id;
        //bước 4 nếu có
        if($request->step_4 == "")
            $recipes->step_4 = "";
        else
            $recipes->step_4 = $request->step_4;
        //bước 5 nếu có
        if($request->step_5 == "")
            $recipes->step_5 = "";
        else
            $recipes->step_5 = $request->step_5;
        //bước 6 nếu có
        if($request->step_6 == "")
            $recipes->step_6= "";
        else
            $recipes->step_6 = $request->step_6;

        // hình bước 1
        if($request->hasFile('image_1')){
            $file = $request-> file('image_1');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_1 = $hinh;
        }else{
            $recipes->image_1 = "";
        }
        // hình bước 2
        if($request->hasFile('image_2')){
            $file = $request-> file('image_2');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_2 = $hinh;
        }else{
            $recipes->image_2 = "";
        }
        // hình bước 3
        if($request->hasFile('image_3')){
            $file = $request-> file('image_3');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_3 = $hinh;
        }else{
            $recipes->image_3 = "";
        }
        // hình bước 4
        if($request->hasFile('image_4')){
            $file = $request-> file('image_4');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_4 = $hinh;
        }else{
            $recipes->image_4 = "";
        }
        // hình bước 5
        if($request->hasFile('image_5')){
            $file = $request-> file('image_5');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('recipes');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_5 = $hinh;
        }else{
            $recipes->image_5 = "";
        }
        // hình bước 6
        if($request->hasFile('image_6')){
            $file = $request-> file('image_6');
            $duoi = $file -> getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'  && $duoi != 'jpeg'){
                return redirect('admin/recipes/add')->with('thongbao','Bạn chỉ được chọn file có đuôi jpg,png,jpeg! ');
            }
            // $file = $request->file('sanpham');
            $name = $file->getClientOriginalName();
            $hinh = str_random(4)."_".$name;
            while(file_exists("upload/recipes/".$hinh)){
                $hinh = str_random(4)."_".$name;
            }
            $file->move("upload/recipes",$hinh);
            $recipes->image_6= $hinh;
        }else{
            $recipes->image_6 = "";
        }
        $recipes->level = $request->level;
        $recipes->amount = $request->amount; // số nguyên liệu
        $recipes->materials = $request->materials; // các nguyên liệu
        $recipes->eater = $request->eater; // số người ăn
        $recipes->time = $request->time; // thời gian thực hiện
        $recipes->status = 1; // trạng thái
        $recipes->save();

        return redirect('admin/recipes/edit/'.$id)->with('thongbao','Sửa thành công');

    }

    public function getDelete($id){

        $recipes = Recipes::find($id);

        if($recipes->status ==0){
            $recipes->status = 1;
        }
        else{
           $recipes->status = 0;
        }
        
        $recipes->save();

        return redirect('admin/recipes/list')->with('thongbao','Bạn đã xóa thành công');
    }
}
