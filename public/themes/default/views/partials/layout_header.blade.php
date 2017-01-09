<!-- Navbar -->
    <div class="header-wrap pos-ontop">
        <div class="top-bar-wrap">
            <div class="row">
            <div class="large-12 columns">
                <nav class="top-bar large-header">
                    <!-- Title Area -->

                    <ul class="title-area">
                        <li class="name"><h1><a href="#">HumboldtWeb</a></h1></li>
                        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                    </ul>

                    <!-- Naviagtion Section -->
                    <section class="top-bar-section">
						<ul class="nav">
							<li class="divider hide-for-small"></li>
			
							@foreach ($module_menu_array as $menu_section => $menus)
									@if ( ! is_array($menus))
										<li>
										<a href="{{ $menus }}">{{ $menu_section }}</a>
									@else
										<li class="has-dropdown">
										<a href="#">{{ $menu_section }}</a>
										<ul class="dropdown">
											@foreach ($menus as $menu_link)
												@if (isset($menu_link['divider']))
													<li class="{{ $menu_link['divider'] }}"></li>
												@elseif(isset($menu_link['label']))
													<li class="{{ isset($menu_link['children']) ? 'has-dropdown' : '' }}">
														<a href="{{ isset($menu_link['url'])?$menu_link['url']:'#' }}">{{ $menu_link['label'] }}</a>
														@if ( ! empty($menu_link['children']))
															<ul class="dropdown">
																@foreach ($menu_link['children'] as $child_link)
																	@if (isset($child_link['divider']))
																		<li class="{{ $child_link['divider'] }}"></li>
																	@else
																		<li><a href="{{ isset($child_link['url']) ?$child_link['url']:'#' }}">{{ $child_link['label'] }}</a></li>
																	@endif
																@endforeach
															</ul>
														@endif
													</li>
												@endif
											@endforeach
										</ul>
									@endif
								</li>
							@endforeach
						</ul>

                        <ul class="nav pull-right">
							<li class="divider hide-for-small"></li>
							@if (Sentry::check())
								<li class="{{ (Request::is('users/show/' . Sentry::getUser()->id) ? 'active has-dropdown' : 'has-dropdown') }}">
									<a href="/users/show/{{ Sentry::getUser()->id }}" title="View Profile">
										<?php //gravatar( Sentry::getUser()->email, 25, 'mm', 'x',true, array('class'=>'radius') ) ?>
										{{ Sentry::getUser()->first_name }}</a>
										<ul class="dropdown">
											<li><a href="{{ URL::to('/users/edit/'.Sentry::getUser()->id) }}">Edit Profile</a></li>
											<li><a href="{{ URL::to('users/logout') }}">Logout</a></li>
										</ul>
								</li>
								
							@else
								<li {{ (Request::is('users/login') ? 'class="active"' : '') }}>
									<a href="{{ URL::to('users/login') }}">Login</a>
								</li>
								<li {{ (Request::is('users/register') ? 'class="active"' : '') }}>
									<a href="{{ URL::to('users/register') }}">Register</a>
								</li>
							@endif
						</ul>

                    </section>
                </nav>
            </div>
            </div>        
        </div><!-- End Navigation -->
    </div><!-- ./ navbar -->
