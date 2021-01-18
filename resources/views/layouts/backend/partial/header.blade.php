   <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Blog Dashboard<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>


      <!-- Admin Dashboard Menu Acces -->
      @if(Request::is('admin*'))

      <div class="br-sideleft-menu">
        <a href="{{ route('admin.dashboard') }}" class="br-menu-link {{ Request::is('admin/dashboard') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ route('admin.tag.index') }}" class="br-menu-link {{ Request::is('admin/tag*') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-pricetags-outline tx-20"></i>
            <span class="menu-item-label">Tags</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ route('admin.category.index') }}" class="br-menu-link {{ Request::is('admin/category*') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Category</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ route('admin.post.index') }}" class="br-menu-link {{ Request::is('admin/post*') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
            <span class="menu-item-label">Posts</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ route('admin.post.pending') }}" class="br-menu-link {{ Request::is('admin/pending/post') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
            <span class="menu-item-label">Pending Post</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        
        <a href="{{ route('admin.favorite.index') }}" class="br-menu-link {{ Request::is('admin/favorite') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-star tx-22"></i>
            <span class="menu-item-label">Favorite Post</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        
        <a href="{{ route('admin.subscriber.index') }}" class="br-menu-link {{ Request::is('admin/subscriber') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-android-notifications-none tx-22"></i>
            <span class="menu-item-label">Subscriber</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        
      </div><!-- br-sideleft-menu -->


      <!-- System Menu -->
      <span class="sidebar-label pd-x-15 mg-t-25 tx-info op-9">System</span>

      <a href="{{ route('admin.settings') }}" class="br-menu-link {{ Request::is('admin/settings') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-22"></i>
            <span class="menu-item-label">Settings</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

      <a class="br-menu-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
            <i class="icon ion-power"></i>
            <span class="menu-item-label">Log Out</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

      @endif



      <!-- Author Dashboard Menu Acces -->
      @if(Request::is('author*'))
      <div class="br-sideleft-menu">
        <a href="{{ route('author.dashboard') }}" class="br-menu-link {{ Request::is('author/dashboard') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="{{ route('author.post.index') }}" class="br-menu-link {{ Request::is('author/post*') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
            <span class="menu-item-label">Posts</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        
        <a href="{{ route('author.favorite.index') }}" class="br-menu-link {{ Request::is('author/favorite') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-star tx-22"></i>
            <span class="menu-item-label">Favorite Post</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

      </div><!-- br-sideleft-menu -->


      <!-- System Menu -->
      <span class="sidebar-label pd-x-15 mg-t-25 tx-info op-9">System</span>

      <a href="{{ route('author.settings') }}" class="br-menu-link {{ Request::is('author/settings') ?'active' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-22"></i>
            <span class="menu-item-label">Settings</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

      <a class="br-menu-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
            <i class="icon ion-power"></i>
            <span class="menu-item-label">Log Out</span>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>

      @endif
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->


    