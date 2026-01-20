
<div class="user-profile-icons" itemscope itemtype="https://schema.org/Organization">
    <ul>
        <li class="sidebar-logo-mobile">
            <a class="sidebar-logo" href="{{url('/')}}/" itemscope itemprop="url">
                <img src="/assets/default/img/sidebar/logo.svg" alt="Rurera Logo" width="150" height="38"><span class="sidebar-logo-text"></span>
            </a>
        </li>
        <li class="streak-dropdown">
            <a href="#" class="streak-icon">
                <img src="/assets/default/svgs/fire-stroke.svg" height="800" width="800" alt="fire-stroke"> 1
            </a>
            <div class="streak-dropdown-content">
                <div class="streak-days">
                    <div class="streak-day-head">
                        <div class="text-box">
                            <h4 class="font-18 font-weight-bold mb-5"><span>1</span> day streak</h4>
                            <p class="sub">You've earned your longest streak ever!</p>
                        </div>
                        <div class="icon-box">
                            <img src="/assets/default/svgs/fire-stroke.svg" height="800" width="800" alt="fire-stroke">
                        </div>
                    </div>
                    <div class="days-list">
                        <ul>
                            <li class="frozen-streak">
                                <span class="day">M</span>
                                <span class="day-circle">
                                    <img src="/assets/default/svgs/snowflake-cold.svg" height="64" width="64" alt="snowflake-cold">
                                </span>
                            </li>
                            <li class="active-streak">
                                <span class="day">T</span>
                                <span class="day-circle">
                                    <img src="/assets/default/svgs/fire2.svg" height="64" width="64" alt="fire">
                                </span>
                            </li>
                            <li class="active-streak">
                                <span class="day">W</span>
                                <span class="day-circle">
                                    <img src="/assets/default/svgs/fire2.svg" height="64" width="64" alt="fire2">
                                </span>
                            </li>
                            <li class="broken-streak">
                                <span class="day">T</span>
                                <span class="day-circle">
                                    <img src="/assets/default/svgs/broken-heart.svg" height="64" width="64" alt="broken-heart">
                                </span>
                            </li>
                            <li class="active-streak">
                                <span class="day">F</span>
                                <span class="day-circle">
                                    <img src="/assets/default/svgs/fire2.svg" height="64" width="64" alt="fire2">
                                </span>
                            </li>
                            <li class="not-started">
                                <span class="day">S</span>
                                <span class="day-circle">
                                    <img src="/assets/default/svgs/red-circle.svg" height="64" width="64" alt="red-circle">
                                </span>
                            </li>
                            <li class="not-started">
                                <span class="day">S</span>
                                <span class="day-circle">
                                    <img src="/assets/default/svgs/red-circle.svg" height="64" width="64" alt="red-circle">
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="streak-society">
                    <div class="society-content">
                        <div class="icon-box">
                            <span>🔒</span>
                        </div>
                        <div class="text-box">
                            <h5>Streak Society</h5>
                            <p>Reach a 7 day streak to unlock exclusive rewards.</p>
                        </div>
                    </div>
                </div>
                <div class="btn-holder">
                    <button type="button" class="view-btn">VIEW MORE</button>
                </div>
                
            </div>
        </li>
        @if(auth()->check() && (auth()->user()->isUser()))
        <li class="dropdown dropdown-list-toggle">
            <strong>
                <img src="/assets/default/img/panel-sidebar/1.png" alt="1">
                @if(!empty($unReadNotifications) and count($unReadNotifications))
                {{ count($unReadNotifications) }}
                @else
                0
                @endif
            </strong>

            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">{{ trans('admin/main.notifications') }}
                    <div class="float-right">
                        @can('admin_notifications_markAllRead')
                        <a href="{{ getAdminPanelUrl() }}/notifications/mark_all_read">{{ trans('admin/main.mark_all_read') }}</a>
                        @endcan
                    </div>
                </div>

                <div class="dropdown-list-content dropdown-list-icons">
                    @foreach($unReadNotifications as $unreadNotification)
                    <a href="{{ getAdminPanelUrl() }}/notifications" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white d-flex align-items-center justify-content-center">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            <span class="notifications-lable">{{ $unreadNotification->title }}</span>
                            <div class="time text-primary">{{ dateTimeFormat($unreadNotification->created_at,'Y M j | H:i') }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="dropdown-footer text-right">
                    <a href="{{ getAdminPanelUrl() }}/notifications">{{ trans('admin/main.view_all') }} <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        {{--<li>
            <div class="assignments">
                <strong>
                    <img src="/assets/default/img/sidebar/games.svg" alt="games">
					@if( $authUser->game_time > 0)
						{{getTimeWithText($authUser->game_time, false, false, false)}}
					@else
						0 m
					@endif
                </strong>
            </div>
        </li>--}}

        <li class="dropdown dropdown-list-toggle">
            <strong>
                <img src="/assets/default/img/panel-sidebar/coins.svg" alt="coins">
                {{$authUser->getRewardPoints()}}
            </strong>
            <div class="dropdown-menu user-coins-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">
                    <img src="/assets/default/img/panel-sidebar/coins.svg" alt="coins">
                    <div class="coins-text">
                        Coins
                        <span>You have {{$authUser->getRewardPoints()}} Coins <a href="/shop">Go to Shop</a></span>
                    </div>
                </div>
            </div>
        </li>
        @endif

        <li class="sidebar-no-mobile">
            <div class="xs-w-100 d-flex align-items-center justify-content-between">
                @if(!empty($authUser))
                <!-- <div class="d-flex">
                    <div class="border-left mx-5 mx-lg-15"></div>
                </div> -->
                @endif

                @if(!empty($authUser))

                @if(auth()->check() && (auth()->user()->isUser()))
                <div class="dropdown">
                    <a href="#!" class="navbar-user d-flex align-items-center dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img src="{{ $authUser->getAvatar() }}" class="rounded-circle"
                             alt="{{ $authUser->get_full_name() }}" width="400" height="400" itemprop="image"
                             alt="rounded circle" loading="eager" title="rounded circle">
                    </a>

                    <div class="dropdown-menu user-profile-dropdown" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item user-nav-detail">
                            <img src="{{ $authUser->getAvatar() }}" class="rounded-circle" alt="{{ $authUser->get_full_name() }}" width="400" height="400" itemprop="image"
                                 alt="rounded circle" loading="eager" title="rounded circle">
                            <span class="font-16 text-dark-blue user-name">{{ $authUser->get_full_name() }}</span>
                            <a href="/panel/setting" class="font-16 text-dark-blue user-manage-btn">Manage Account</a>
                        </div>
                        <div class="d-md-none border-bottom mb-20 pb-10 text-right">
                            <i class="close-dropdown" data-feather="x" width="32" height="32" class="mr-10"></i>
                        </div>
                        @php $parent_id = 0; @endphp
                        @if( !empty( $profile_navs ) )
                        <div class="user-nav-list">
                            @foreach( $profile_navs as $profile_nav)

                            @php $parent_id = isset($profile_nav['id'])? $profile_nav['id'] : $parent_id; @endphp

                            <a class="dropdown-item " data-toggle="modal" data-target="#switch_user_modal" href="/panel/switch_user/{{$profile_nav['id']}}">
                                <img src="{{ $profile_nav->getAvatar() }}" class="rounded-circle" alt="{{ $profile_nav['full_name'] }}" width="400" height="400" itemprop="image"
                                     alt="rounded circle" loading="eager" title="rounded circle">
                                @php $full_name = (isset( $navData['is_parent'] ) && $navData['is_parent'] == true)? 'Parent Dashboard' : $profile_nav['full_name']; @endphp
                                <span class="font-16 text-dark-blue user-list-name">{{ $full_name }}</span>
                                <span class="font-16 text-dark-blue user-list-email">{{ $profile_nav['email'] }}</span>
                            </a>
                            @endforeach
                        </div>
                        @endif
                        <a class="dropdown-item nav-logout" href="/logout">
                            <img src="/assets/default/img/icons/sidebar/logout.svg" height="24" itemprop="image"
                                 width="24" alt="nav-icon" title="nav-icon" loading="eager">
                            <span class="font-16 text-dark-blue">{{ trans('panel.log_out') }}</span>
                        </a>
                    </div>
                </div>
                @endif
                @else
                <div class="d-flex align-items-center ml-md-50">
                    <a href="/login" class="py-5 px-15 mr-10 text-dark-blue font-16 login-btn">Log in</a>
                    <a href="/register" class="py-5 px-15 text-dark-blue font-16 register-btn">Try for free</a>
                </div>
                @endif
            </div>
        </li>
        <li class="menu-button-mobile">
            <button class="navbar-toggler navbar-order" type="button" id="navbarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
        </li>
    </ul>
</div>

<div class="modal fade switch_user_modal" id="switch_user_modal" tabindex="-1" role="dialog" aria-labelledby="switch_user_modal_label/" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-box">
                    <div class="modal-title">
                        <h3>Enter the Password</h3>
                    </div>
                    <form method="post" action="javascript:;" class="mt-35 switch_user_login">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="input-label" for="email">Password:</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password"
                               aria-describedby="emailHelp">
                        <input type="hidden" name="user_id" value="{{isset($parent_id)? $parent_id : 0}}">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-20">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
