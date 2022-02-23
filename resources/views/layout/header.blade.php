<div class="navbar navbar-fixed">
    <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-purple no-shadow">
      <div class="nav-wrapper">

        <ul class="navbar-list right">
        <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a></li>
        <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{asset('app-assets/images/gallery/35.png')}}" alt="avatar"><i></i></span></a></li>
        </ul>
        <!-- translation-button-->
        <ul class="dropdown-content" id="translation-dropdown">

        </ul>
        <!-- notifications-dropdown-->
        <ul class="dropdown-content" id="notifications-dropdown">
          <li>
            <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
          </li>
          <li class="divider"></li>
          <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 baru</time>
          </li>
          <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 baru</time>
          </li>
          <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 baru</time>
          </li>
          <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 baru</time>
          </li>
        </ul>
        <!-- profile-dropdown-->
        <ul class="dropdown-content" id="profile-dropdown">
          <li><a class="grey-text text-darken-1" href="{{url('profile')}}"><i class="material-icons">person_outline</i> Profile</a></li>
          <li class="divider"></li>
          <li>
            <a class="grey-text text-darken-1" href="#" onclick="document.getElementById('logout').submit()">
              <i class="material-icons">keyboard_tab</i> Logout
            </a>
            <form id="logout" method="POST" action="{{ route('logout') }}">
                  @csrf
              </form>
          </li>
        </ul>
      </div>
      <nav class="display-none search-sm">
        <div class="nav-wrapper">
          <form>
            <div class="input-field">
              <input class="search-box-sm" type="search" required="">
              <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
            </div>
          </form>
        </div>
      </nav>
    </nav>
  </div>
