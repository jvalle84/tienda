<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand main-title" href="{{ route('home') }}">FiSO</a> -->
        <a href="{{ route('home') }}"><img src="/images/logo.png"></a>
    </div>

    <div class="navbar-collapse collapse in" id="bs-example-navbar-collapse-1" aria-expanded="true" style="">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart"></i>&nbsp&nbsp&nbspCarrito</a></li>
        @include('store.partials.menu-user')
      </ul>
    </div>
  </div>
</nav>