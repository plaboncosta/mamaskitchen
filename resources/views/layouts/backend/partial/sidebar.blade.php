
<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('/assets/backend/img/sidebar-1.jpg') }}">
                <!--
                  Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

                  Tip 2: you can also add an image using data-image tag
              -->
                <div class="logo" style="background-color: #8BC34A">
                  <a href="{{ route('admin.dashboard.index') }}" class="simple-text logo-normal">
                    <img src="{{ asset('assets/frontend/images/Logo_stick.png') }}" alt="">
                  </a>
                </div>
                <div class="sidebar-wrapper">
                  <ul class="nav">
                    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }} ">
                      <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/slider') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.slider.index') }}">
                        <i class="material-icons">slideshow</i>
                        <p>Slider</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/about') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.about.index') }}">
                        <i class="material-icons">payment</i>
                        <p>About Us</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/category') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.category.index') }}">
                        <i class="material-icons">apps</i>
                        <p>Category</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/item') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.item.index') }}">
                        <i class="material-icons">library_books</i>
                        <p>Item</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/reservation') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.reservation.index') }}">
                        <i class="material-icons">chrome_reader_mode</i>
                        <p>Reservation</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/contact') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.contact.index') }}">
                        <i class="material-icons">message</i>
                        <p>Contact</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/social') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.social.index') }}">
                        <i class="material-icons">extension</i>
                        <p>Social Icons</p>
                      </a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
                      <a class="nav-link" href="{{ route('admin.settings.index') }}">
                        <i class="material-icons">settings</i>
                        <p>Settings</p>
                      </a>
                    </li>
                    <li>
                      <a class="nav-link" href="{{ route('welcome') }}" target="_blank">
                        <i class="material-icons">account_balance</i>
                        <p>Live Site</p>
                      </a>
                    </li>
                    <li>
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" target="_blank">
                        <i class="material-icons">exit_to_app</i>
                        <p>Logout</p>
                      </a>
                      <form action="{{ route('logout') }}" method="post" id="logout-form" style="display: none;">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </div>
              </div>