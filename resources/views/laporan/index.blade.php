@extends('template')

@section('main')
<div class="row">
	<div class="col-md-5">
		<h2>Laporan Pelanggaran </h2>
	</div>
	<div class="col-md-6">
		<h2>Laporan Penghargaan</h2>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		@if (!empty($pelanggaran))
		<table class="table table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>No</th>
					<th>No. Induk</th>
					<th>Kode Pelanggaran</th>
					<th>Tanggal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@for ($i=0;$i<$pelmax;$i++)
					<tr>
						<td>{{ $i+1 }}</td>
						<td>{{ $pelanggaran[$i]->no_induk }}</td>
						<td>{{ $pelanggaran[$i]->kode_pelanggaran }}</td>
						<td>{{ $pelanggaran[$i]->created_at->formatLocalized('%A, %d %B %Y')}}</td>
						<td>
							<div class="box-button inline-block">
								<a href="#" class="btn btn-success btn-xs" title="Detail Pelanggaran"><span><i class="fa fa-eye"></i></span></a>
							</div>
							<div class="box-button inline-block">
								{{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs',  'title'=>'Hapus Pelanggaran'] )  }}
							</div>
						</td>
					</tr>
					@endfor
				</tbody>
			</table>
			@else
			<p>Tidak ada data laporan pelanggaran</p>
			@endif
			@if (!empty($penghargaan))
		</div>
		<div class="col-md-5">
			<table class="table table-bordered table-striped table-condensed">
				<thead>
					<tr>
						<th>No</th>
						<th>No. Induk</th>
						<th>Kode Penghargaan</th>
						<th>Tanggal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@for ($i=0;$i<$penmax;$i++)
						<tr>
							<td>{{ $i+1 }}</td>
							<td>{{ $penghargaan[$i]->no_induk }}</td>
							<td>{{ $penghargaan[$i]->kode_penghargaan }}</td>
							<td>{{ $penghargaan[$i]->created_at->formatLocalized('%A, %d %B %Y')}}</td>
								<td>
									<div class="box-button inline-block">
										<a href="#" class="btn btn-success btn-xs" title="Detail Pelanggaran"><span><i class="fa fa-eye"></i></span></a>
									</div>
									<div class="box-button inline-block">
										{{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs',  'title'=>'Hapus Pelanggaran'] )  }}
									</div></td>
								</tr>
								@endfor
							</tbody>
						</table>
						@else
						<p>Tidak ada data laporan penghargaan</p>
						@endif
					</div>
				</div>
			</div>

			@stop

			@section('footer')
			@include('footer')
			@stop
