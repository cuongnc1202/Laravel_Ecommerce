<div class="sidebar">
   <nav class="mt-2 dashboard__nav">
      <ul class="nav nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            Dashboard
            <span class="right badge badge-danger">hot</span>
            </a>
         </li>
      </ul>
   </nav>
   <nav class="navbar banner__nav">
      <a href="{{route('banner.index')}}" class="nav-link">
        <i class="nav-icon fa fa-image"></i>
          Banner
      </a></button>
   </nav>
   <nav class="navbar product__nav">
      <button class="navbar-toggler text-white" type="button" id="product--toggle" data-toggle="collapse" data-target="#collapsibleProduct" aria-controls="collapsibleProduct"
         aria-expanded="false" aria-label="Toggle navigation"><i class="nav-icon fa fa-list"></i> Product Manager <i class="fa fa-angle-down"></i></button>
      <div class="collapse navbar-collapse show" id="collapsibleProduct">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"    data-accordion="false">
            <li class="nav-item active">
               <a href="{{route('category.index')}}" class="nav-link">
               <i class="nav-icon fa fa-folder"></i>
               Category
               </a>
            </li>
            <li class="nav-item">
               <a href="{{route('product.index')}}" class="nav-link">
               <i class="nav-icon fa fa-th"></i>
               Products List
               </a>
            </li>
            <li class="nav-item ">
               <a href="{{route('color.index')}}" class="nav-link">
               <i class="nav-icon fas fa-braille"></i>
               Product' Colors
               </a>
            </li>
            <li class="nav-item ">
               <a href="{{route('size.index')}}" class="nav-link">
               <i class="nav-icon fas fa-window-maximize"></i>
               Product' Sizes
               </a>
            </li>
            <li class="nav-item ">
               <a href="#" class="nav-link">
               <i class="nav-icon fas fa-comment"></i>
               Product' Reviews
               </a>
            </li>
         </ul>
      </div>
   </nav>
   <nav class="navbar customer__nav">
      <button class="navbar-toggler text-white" type="button" id="customer--toggle" data-toggle="collapse" data-target="#collapsibleCustomer" aria-controls="collapsibleCustomer"
         aria-expanded="false" aria-label="Toggle navigation"><i class="nav-icon fa fa-users"></i> Customer Manager <i class="fa fa-angle-down"></i></button>
      <div class="collapse navbar-collapse show" id="collapsibleCustomer">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"    data-accordion="false">
            <li class="nav-item active">
              <a href="{{route('customer.index')}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                  Customer list
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('order.index')}}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                  Order List
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('contact.index')}}" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                  Feedback
              </a>
            </li>
         </ul>
      </div>
   </nav>
   <nav class="navbar post__nav">
      <a href="{{route('blog.index')}}" class="nav-link">
        <i class="nav-icon fa fa-rocket"></i>
          Post
      </a></button>
   </nav>
</div>