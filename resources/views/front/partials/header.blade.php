<!-- Header -->
<header id="header">
	<h1><a href="{{url('/')}}">E-Lycee</a></h1>
	<nav class="links">
		<ul>
			<li><a href="{{url('/mentions')}}">Mentions Légales</a></li>
			<li><a href="{{url('/contact')}}">Contact</a></li>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			@if(Auth::check())
				<li><a class="fa-cogs" href="{{url('/admin')}}" title="Accéder à l'admin">Admin</a></li>
			@endif
			<li><a class="fa-sign-in" href="{{url('/login')}}" title="Se connecter">Se connecter</a></li>
			<li class="search">
				<a class="fa-search" href="#search" title="Recherche d'articles">Recherche d'articles</a>
				<form id="search" method="get" action="{{url('/search')}}">
					<input type="text" name="search" placeholder="Recherche d'articles" />
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu" title="Menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>

<!-- Menu -->
<section id="menu">

	<!-- Search -->
	<section>
		<form class="search" action="{{url('/search')}}" method="GET">
			<input type="text" name="search" placeholder="Recherche d'articles" />
			<button type="submit">Rechercher</button>
		</form>
	</section>

	<!-- Links -->
	<section>
		<ul class="links">
			<li>
				<a href="#">
					<h3>Lorem ipsum</h3>
					<p>Feugiat tempus veroeros dolor</p>
				</a>
			</li>
			<li>
				<a href="#">
					<h3>Dolor sit amet</h3>
					<p>Sed vitae justo condimentum</p>
				</a>
			</li>
			<li>
				<a href="#">
					<h3>Feugiat veroeros</h3>
					<p>Phasellus sed ultricies mi congue</p>
				</a>
			</li>
			<li>
				<a href="#">
					<h3>Etiam sed consequat</h3>
					<p>Porta lectus amet ultricies</p>
				</a>
			</li>
		</ul>
	</section>

	<!-- Actions -->
	<section>
		<ul class="actions vertical">
			<li><a href="#" class="button big fit">Log In</a></li>
		</ul>
	</section>

</section>