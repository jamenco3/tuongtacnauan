@extends('admin.layout.index')
@section('content')
<div class="span9" id="content">                  
    <div class="row-fluid">
        <!-- block -->
	<div class="block">
	    <div class="navbar navbar-inner block-header">
	        <div class="muted pull-left">Dish->List</div>
	    </div>
	    <div class="block-content collapse in">
	        <div class="span12">
	           <div class="table-toolbar">
	              <div class="btn-group">
	                 <a href="{{route('addRecipes')}}"><button class="btn btn-success">Thêm mới <i class="icon-plus icon-white"></i></button></a>
	              </div>
	              <div class="btn-group pull-right">
	                 <button data-toggle="dropdown" class="btn dropdown-toggle">Công cụ <span class="caret"></span></button>
	                 <ul class="dropdown-menu">
	                    <li><a href="#">Print</a></li>
	                    <li><a href="#">Save as PDF</a></li>
	                    <li><a href="#">Export to Excel</a></li>
	                 </ul>
	              </div>
	           </div>
	            
	            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
	                <thead>
	                    <tr>
	                        <th>ID</th>
	                        <th>Món ăn</th>
	                        <th>User đăng</th>
	                        <th>Số nguyên liệu</th>
	                        {{-- <th>Nguyên liệu chi tiết</th> --}}
	                        <th>Số người</th>
	                        <th>Thời gian</th>
	                       {{--  <th>Bước 1</th>
	                        <th>Bước 2</th>
	                        <th>Bước 3</th>
	                        <th>Bước 4</th>
	                        <th>Bước 5</th> --}}
	                        {{-- <th>Bước 6</th> --}}
	                        <th>Độ khó</th>
	                        <th>Trạng thái</th>
	                        <th>Thao tác</th>
	                    </tr>
	                </thead>
	                <tbody>
						@foreach($recipes as $re)
	                    <tr class="odd gradeX">
	                        <td>{{ $re->id }}</td>
	                        <td>{{ $re->dish->name }}</td>
	                        <td>{{ $re->user->name }}<img src="ad" alt=""> </td>
	                        <td>{{ $re->amount }}</td>
	                        {{-- <td>{{ $re->materials }}</td> --}}
	                        <td>{{ $re->eater }}</td>
	                        <td>{{ $re->time }} phút</td>
	                        {{-- <td>{{ $re->step_1 }}</td>
	                        <td>{{ $re->step_2 }}</td>
	                        <td>{{ $re->step_3 }}</td>
	                        <td>{{ $re->step_4 }}</td>
	                        <td>{{ $re->step_5 }}</td>
	                        <td>{{ $re->step_6 }}</td> --}}
	                        <td>
	                        	@if($re->level == 1)
	                            {{ "Dễ" }}
	                            @elseif($re->level == 2)
	                            {{ "Trung bình" }}
	                            @else
	                            {{ "Khó" }}
	                            @endif
	                        </td>
	                        @if($re->status == 1)
                            	<td style="color: green">Tồn tại</td>
                        	@else
                            	<td style="color: red">Không tồn tại</td>
                        	@endif
	                        <td class="center">
	                        	@if($re->status ==0)
	                        	<button class="btn btn-default btn-danger"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/recipes/delete/{{ $re->id }}">Khôi phục</a></button><br>
	                        	@else
                            	<button class="btn btn-default "><i class="fa fa-trash-o  fa-fw"></i><a href="admin/recipes/delete/{{ $re->id }}">Xóa</a></button><br>
                            	@endif
                            <button class="btn btn-default">
                            <i class="fa fa-pencil fa-fw"></i> <a href="admin/recipes/edit/{{ $re->id }}">Sửa</a>
                            </button>
                        	</td>      
	                    </tr>
	                 	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
        <!-- /block -->
    </div>		
</div>
@endsection