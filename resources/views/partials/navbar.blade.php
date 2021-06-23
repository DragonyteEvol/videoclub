<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
<a class="navbar-brand btn btn-danger" href="/" style="color:#0A1931;border-radius: 15px;"><b><span style="font-size:15pt">&#9820;</span> VideoClub</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        @if(Auth::check() )
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="mx-5 nav-item {{ Request::is('catalog') && ! Request::is('catalog/create')? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog')}}">
                            <b><span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Catalog</b>
                        </a>
                    </li>
                    <li class="mx-5 nav-item {{  Request::is('catalog/create') ? 'active' : ''}}">
                        <a class="nav-link" href="{{url('/catalog/create')}}">
                            <b><span>&#10010</span>Create movie</b>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="POST" style="display:flex">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link nav-link" style="display:inline;cursor:pointer">
                                <b>Close session</b>
                            </button>
                        </form>
                    </li>
      </ul>
      <form class="d-flex" action="{{route('searchMovie')}}" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
      </form>
    </div>
@endif
  </div>
</nav>
@if(isset($message))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{$message}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
