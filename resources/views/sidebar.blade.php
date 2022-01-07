<div class="header2 bottom-bg">
	<ul class="nav top-menu" style="position:absolute;">
	<li class="mt1">
	    		<a href="{{ url('#') }}" >
	     		<i class="lnr lnr-user"></i>
	      		<span>Selamat datang, {{ Auth::user()->name }}</span>
	      </a>
	    </li>
	  </ul>
	<div class="container">
		<ul class="nav top-menu">
	    <li class="mt1 col-xs-offset-1">
		  	@if (!empty($halaman) && $halaman=='dashboard')
	      	<a class="active" href="{{url('/')}}">
	     	@else
	    		<a href="{{url('/')}}">
	      @endif
	        <i class="lnr lnr-home"></i>
	        <span>Beranda</span>
	        </a>
	    </li>
			<li class="mt1">
				@if (!empty($halaman) && $halaman=='siswa')
					<a class="active" href="{{ url('siswa') }}" >
				@else
					<a href="{{ url('siswa') }}" >	
				@endif
	       		<i class="lnr lnr-users"></i>
	        	<span>Daftar Siswa</span>
	        </a>
			</li> 
	    <li class="mt1">
	    	@if (!empty($halaman) && $halaman=='pelanggaran')
	    		<a class="active" href="{{ url('pelanggaran') }}" >
	   		@else
	        <a href="{{ url('pelanggaran') }}" >
	      @endif
	            <i class="lnr lnr-thumbs-down"></i>
	            <span>Daftar Pelanggaran</span>
	        </a>
	    </li>
	  	<li class="mt1">
	        @if (!empty($halaman) && $halaman=='penghargaan')
	    		<a class="active" href="{{ url('penghargaan') }}" >
	   		@else
	        <a href="{{ url('penghargaan') }}" >
	      @endif
	            <i class="lnr lnr-thumbs-up"></i>
	            <span>Daftar Penghargaan</span>
	        </a>
	    </li>
	    {{--<li class="mt1">
	      <a href="#" >
	     		<i class="lnr lnr-warning"></i>
	      	<span>Sanksi & Tindakan</span>
	      </a>
	    </li>--}}
	    @if (Auth::user()->level != 3)
	    <li class="mt1">
	      @if (!empty($halaman) && $halaman=='laporan')
	    		<a class="active" href="{{ url('laporan') }}" >
	   		@else
	        <a href="{{ url('laporan') }}" >
	      @endif
	     		<i class="lnr lnr-book"></i>
	      	<span>Laporan</span>
	      </a>
	    </li>
	    @endif
	    @if (Auth::user()->level == 1)
	    <li class="mt1">
	      @if (!empty($halaman) && $halaman=='pengguna')
	    		<a class="active" href="{{ route('register') }}" >
	   		@else
	        <a href="{{ route('register') }}" >
	      @endif
	     		<i class="lnr lnr-screen"></i>
	      	<span>Tambah Pengguna</span>
	      </a>
	    </li>
	    @endif
		</ul>	
	</div>
</div>


<!--sidebar end-->