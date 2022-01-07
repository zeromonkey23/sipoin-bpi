<header class="header black-bg">
	<a href="{{ url('/') }}" class="logo"><i class="fa fa-briefcase fa-1x"></i><b> SIMPAN POIN BPI</b></a>
	@if (Auth::check())
	<div class="top-menu">
		<ul class="nav pull-right top-menu">
			<li>
			<a class="logout" href="{{ route('logout') }}"
				onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">
				Keluar
			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
			</li>
		</ul>
	</div>
	@else 
	<div class="top-menu">
		<ul class="nav pull-right top-menu">
			<li>
			<a class="logout" href="{{ route('register') }}">
				Tambah Pengguna
			</a>
			</li>
		</ul>
	</div>
	@endif
</header>