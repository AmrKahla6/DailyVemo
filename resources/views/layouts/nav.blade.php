<nav class="navbar navbar-expand-lg fixed-top bg-danger" color-on-scroll="0">
    <div class="container">
      <div class="navbar-translate">
      <a class="navbar-brand" href="{{ route('frontend.landing') }}" rel="tooltip" title="Coded by DailyVemo" data-placement="bottom">
            Daily-Vemo
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <!-- Example single danger button -->
                        <a  class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($categories as $categorie)
                                 <a class="dropdown-item" href="{{ route('front.category' ,$categorie->id) }}">{{ $categorie->name }}</a>
                           @endforeach
                        </div>
              </li>
          <li class="nav-item dropdown">
            <!-- Example single danger button -->
                    <a  class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Skills
                    </a>
                    <div class="dropdown-menu">
                        @foreach ($skills as $skill)
                            <a class="dropdown-item" href="{{ route('front.skill' ,$skill->id) }}">{{ $skill->name }}</a>
                        @endforeach
                    </div>
          </li>
          @guest
            <li class="nav-item">
            <a href="{{ url('/login') }}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/register') }}" class="nav-link">Register</a>
            </li>
          @else

          <li class="nav-item dropdown">
                    <a  class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('front.profile' , ['id' => auth()->user()->id , 'slug' => slug(auth()->user()->name)]) }}">Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                </div>
          </li>

          @endguest
          <li>
            <form class="form-inline lm-auto" style="margin-top : 15px" action="{{ route('home') }}">
                @csrf
                <div class="form-group has-white">
                   <input type="text"  name="search" class="form-control" placeholder="Search...">
                </div>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
