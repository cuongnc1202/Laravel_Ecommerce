
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{url('/assets')}}/img/user3-128x128.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
              <span class="right badge badge-danger">hot</span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('category.index')}}" class="nav-link">
            <i class="nav-icon fas fa-folder"></i>
            <p>
              Quản Lý Danh Mục
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('product.index')}}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Quản Lý Sản Phẩm
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('customer.index')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Quản Lý Khách Hàng
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('order.index')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Quản Lý Đơn Hàng
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('material.index')}}" class="nav-link">
            <i class="nav-icon fas fa-filter"></i>
            <p>
              Quản Lý Chất Liệu
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('banner.index')}}" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
            <p>
              Quản Lý Banner
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('blog.index')}}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Quản Lý Tin Tức
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        <hr>
        <li class="nav-item">
          <a href="{{route('contact.index')}}" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              Feedback
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>