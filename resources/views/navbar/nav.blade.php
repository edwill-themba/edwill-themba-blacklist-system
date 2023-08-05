<header>
    <nav class="navbar navbar-expand bg-dark navigation">
        <div class="container">
          <a href="/" class="brand">JSBC Blacklist</a>
          <ul class="menu">
            <!-- check if user is authenticated -->
            @auth
             <li>
               <a href="{{route('logout.user')}}"  onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 {{ __('logout') }}
               </a>
               <form action="{{route('logout.user')}}" id="logout-form" method="post" style="display:none;">
                {{ csrf_field() }}
               </form>
              </li>
              <li class="user-name">
                 {{  Auth::user()->name }}
              </li>
            @else
              <li>
               <a href="/login" class="brand">Login</a>  
              </li>
            @endauth
          </ul>
        </div>
    </nav>
</header>
