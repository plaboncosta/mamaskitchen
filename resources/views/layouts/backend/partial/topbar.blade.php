
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                  <div class="container-fluid">
                    <div class="navbar-wrapper">
                      <a class="navbar-brand" href="#pablo">Hello, {{ Auth::user()->name }}</a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end">
                      <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">person</i>
                            <p class="d-lg-none d-md-block">
                              Account
                            </p>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                            <a class="dropdown-item" href="{{ route('admin.settings.index') }}">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Log out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                            @csrf
                          </form>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>