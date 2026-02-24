@php
    if (empty($authUser) and auth()->check()) {
    $authUser = auth()->user();
    }

    $navBtnUrl = null;
    $navBtnText = null;

    if(request()->is('forums*')) {
    $navBtnUrl = '/forums/create-topic';
    $navBtnText = trans('update.create_new_topic');
    } else {
    $navbarButton = getNavbarButton(!empty($authUser) ? $authUser->role_id : null);

    if (!empty($navbarButton)) {
    $navBtnUrl = $navbarButton->url;
    $navBtnText = $navbarButton->title;
    }
    }
    $navbarPages = isset( $navData['navbarPages'] )? $navData['navbarPages'] : array();
    $profile_navs = isset( $navData['profile_navs'] )? $navData['profile_navs'] : array();

    $no_menu_array = array('dashboard','learn', 'timestable', 'spells', 'books','tests','quests','analytics','marketing','setting', 'set-work');
    $patterns = [];

    foreach ($no_menu_array as $item) {
        $patterns[] = $item;
        $patterns[] = $item . '/*';
    }
@endphp
@if (!request()->is($patterns))
    <div id="navbarVacuum"></div>

    <nav id="navbar" class="navbar1 navbar-expand-lg navbar-light top-navbar">
        <div class="{{ (!empty($isPanel) and $isPanel) ? 'container-fluid' : 'container-fluid'}}">
            <div class="d-flex align-items-center justify-content-between w-100">

                <a class="navbar-brand navbar-order d-flex align-items-center justify-content-center mr-0 {{ (empty($navBtnUrl) and empty($navBtnText)) ? 'ml-auto' : '' }}" href="{{url('/')}}/" itemprop="url">
                    @if(!empty($generalSettings['logo']))
                        <img src="{{ $generalSettings['logo'] }}" class="img-cover" alt="Rurera Logo" title="Rurera Logo" width="185" height="38" itemprop="image" loading="eager">
                    @endif
                </a>

                <button class="navbar-toggler navbar-order" type="button" aria-label="navbar toggler" id="navbarToggle">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="mx-lg-30 d-none d-lg-flex flex-grow-1 navbar-toggle-content " id="navbarContent">
                    <a class="mobile-logo" href="{{url('/')}}/" itemprop="url">
                        <img src="{{ $generalSettings['logo'] }}" alt="Rurera Logo" title="Rurera Logo" width="185" height="38" itemprop="image" loading="eager">
                    </a>
                    <div class="navbar-toggle-header text-right d-lg-none">
                        <button class="btn-transparent" id="navbarClose">
                            <img src="/assets/default/svgs/close.svg" alt="close">
                        </button>
                    </div>

                    <ul class="navbar-nav mr-auto d-flex align-items-center">
                        @if(!empty($navbarPages) and count($navbarPages))
                            @foreach($navbarPages as $navbarPage)
                                @php $is_menu_show = true; $is_panel = false; @endphp
                                @if( (!isset( $navbarPage['is_other_panel'] ) || $navbarPage['is_other_panel'] != 1) && $is_panel == false) @php $is_menu_show = false; @endphp @endif
                                @if( $is_menu_show == false) @php continue; @endphp @endif
                                @php $active_class = ('/'.request()->segment(count(request()->segments())) == $navbarPage['link'])? 'current-page' : ''; @endphp
                                <li class="nav-item {{ (isset( $navbarPage['menu_classes']) && $navbarPage['menu_classes'] != '')
                                ?$navbarPage['menu_classes'] : '' }}{{ (isset( $navbarPage['is_mega_menu']) && $navbarPage['is_mega_menu'] == 1)
                                ?' has-mega-menu' : '' }} {{$active_class}}">
                                    <a class="nav-link" href="{{ $navbarPage['link'] }}">{{ $navbarPage['title'] }}</a>
                                    @if( (isset( $navbarPage['title']) && $navbarPage['title'] == 'Courses') &&
                                    !empty($course_navigation))
                                        <div class="lms-mega-menu">
                                            <div class="mega-menu-head">
                                                <ul class="mega-menu-nav d-flex nav">
                                                    @php $count = 1; @endphp
                                                    @foreach($course_navigation as $navigation_slug => $nagivation_data)
                                                        @if($count == 1)
                                                            <style>
                                                                :root {
                                                                    --category-color: #2c72af;
                                                                }
                                                            </style>
                                                        @endif

                                                        <li>
                                                            <a href="#{{$navigation_slug}}" data-category_color="{{$nagivation_data['color']}}"
                                                               class="{{ ($count == 1)? 'active' : ''}}" id="{{$navigation_slug}}-tab"
                                                               data-toggle="tab"
                                                               data-target="#{{$navigation_slug}}"
                                                               role="tab"
                                                               aria-controls="{{$navigation_slug}}" aria-selected="true">{{$nagivation_data['title']}}</a>
                                                        </li>
                                                        @php $count++; @endphp
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <div class="mega-menu-body tab-content">
                                                @php $count = 1; @endphp
                                                @foreach($course_navigation as $navigation_slug => $nagivation_data)
                                                    <div class="tab-pane fade {{ ($count == 1)? 'show active' : ''}}"
                                                         id="{{$navigation_slug}}" role="tabpanel"
                                                         aria-labelledby="{{$navigation_slug}}-tab">
                                                        <div class="row">
                                                            @if( (isset( $nagivation_data['menu_data'] ) && $nagivation_data['menu_data'] !=
                                                            ''))
                                                                <div class="col-12 col-lg-3 col-md-4">
                                                                    {!! $nagivation_data['menu_data'] !!}
                                                                </div>
                                                            @endif
                                                            @if( isset( $nagivation_data['chapters'] ) && !empty(
                                                            $nagivation_data['chapters']))
                                                                @if( (isset( $nagivation_data['menu_data'] ) && $nagivation_data['menu_data'] !=
                                                                ''))
                                                                    <div class="col-12 col-lg-9 col-md-8">
                                                                        @else
                                                                            <div class="col-12 col-lg-12 col-md-12 pl-30">
                                                                                @endif
                                                                                <div class="row">
                                                                                    @foreach($nagivation_data['chapters'] as $chapter_id =>
                                                                                    $chapter_data)
                                                                                        @if( (isset( $nagivation_data['menu_data'] ) &&
                                                                                        $nagivation_data['menu_data'] != ''))
                                                                                            <div class="col-12 col-lg-4 col-md-6">
                                                                                                @else
                                                                                                    <div class="col-12 col-lg-3 col-md-6">
                                                                                                        @endif
                                                                                                        <div class="menu-colum-text">
                                                                                                            <a href="/{{$navigation_slug}}/{{$chapter_data['chapter_slug']}}"><strong>{!! isset(
                                                                        $chapter_data['chapter_icon_code'] )?
                                                                        $chapter_data['chapter_icon_code'] :
                                                                        '' !!}{{isset(
                                                                        $chapter_data['chapter_title'] )?
                                                                        $chapter_data['chapter_title'] :
                                                                        ''}}</strong>
                                                                                                            </a>
                                                                                                            @if( isset( $chapter_data['topics']) && !empty(
                                                                                                            $chapter_data['topics'] ) )
                                                                                                                <ul class="topic-list">
                                                                                                                    @php $topics_count = 1; @endphp
                                                                                                                    @foreach($chapter_data['topics'] as $topic_id =>
                                                                                                                    $topicData)
                                                                                                                        @php
                                                                                                                            $topic_title = isset( $topicData['title'] )? $topicData['title'] : '';
                                                                                                                            $topic_custom_link = isset( $topicData['custom_link'] )? $topicData['custom_link'] : '';
                                                                                                                            $chapter_link = '/course/'.$chapter_data['chapter_slug'].'#subject_'.$topic_id;
                                                                                                                            $chapter_link = ($topic_custom_link != '')? $topic_custom_link : $chapter_link;
                                                                                                                        @endphp
                                                                                                                        @if( $topics_count <= 8)
                                                                                                                            <li>
                                                                                                                                <a href="{{$chapter_link}}">{{$topic_title}}</a>
                                                                                                                            </li>
                                                                                                                        @else
                                                                                                                            <li style="display:none;">
                                                                                                                                <a href="/course/{{$chapter_data['chapter_slug']}}#subject_{{$topic_id}}">{{$topic_title}}</a>
                                                                                                                            </li>
                                                                                                                        @endif
                                                                                                                        @php $topics_count++; @endphp
                                                                                                                    @endforeach
                                                                                                                    @if( count($chapter_data['topics']) > 8)
                                                                                                                        <li class="load-more">
                                                                                                                            <a href="/course/{{$chapter_data['chapter_slug']}}">...</a>
                                                                                                                        </li>
                                                                                                                    @endif
                                                                                                                </ul>
                                                                                                            @endif
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @endforeach
                                                                                            </div>
                                                                                </div>
                                                                                @endif
                                                                            </div>
                                                                    </div>
                                                                    @php $count++; @endphp
                                                                    @endforeach
                                                        </div>
                                                    </div>
                                                    @else
                                                        @if( isset( $navbarPage['submenu'] ) && $navbarPage['submenu'] != '' && (!isset(
                                                        $navbarPage['is_mega_menu'] ) || $navbarPage['is_mega_menu'] != 1))
                                                            <div class="sidenav-dropdown">
                                                                <ul class="sidenav-item-collapse">
                                                                    {!! $navbarPage['submenu'] !!}
                                                                </ul>
                                                            </div>
                                    @endif
                                    @if( isset( $navbarPage['is_mega_menu'] ) && $navbarPage['is_mega_menu'] == 1) {!! $navbarPage['submenu'] !!} @endif
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                    <div class="mobile-login-reg-buttons">
                        <a class="mobile-login-btn" href="/login">Log in</a>
                        <a class="mobile-register-btn" href="/register-as">Try for free</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
@endif
