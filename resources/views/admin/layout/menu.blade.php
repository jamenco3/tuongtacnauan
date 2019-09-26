
<div class="span3" id="sidebar"> 
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        <li>
            <a href="admin/category/list"><i class="icon-chevron-right"></i>Quản lý thể loại</a>
        </li>
        <li>
            <a href="admin/dish/list"><i class="icon-chevron-right"></i>Quản lý món ăn</a>
        </li>
        {{-- <li>
            <a href="admin/dish/otherlist"><i class="icon-chevron-right"></i>Danh sách món ăn dạng lưới</a>
        </li> --}}
        <li>
            <a href="admin/recipes/list"><i class="icon-chevron-right"></i>Quản lý công thức</a>
        </li>
        <li>
            <a href="admin/slide/list"><i class="icon-chevron-right"></i>Quản lý slide</a>
        </li>
        @if(Auth::check())
                @if(Auth::user()->role == 1)
                    <li>
                        <a href="admin/user/list"><i class="icon-chevron-right"></i>Quản lý user</a>
                    </li>     
            @endif
        @endif  
        <li>
            <a href="#"><i class="icon-chevron-right"></i>Thông tin cá nhân</a>
        </li> 
        <li>
            <a href="{{ route('trang-chu') }}"><i class="icon-chevron-right"></i>Thoát</a>
        </li>     
    </ul>
</div>