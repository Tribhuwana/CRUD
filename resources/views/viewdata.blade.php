<!DOCTYPE html>
<html>
<head>
	<title>Daftar Barang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    

</head>
<body>


<div class="container">
<div class="jumbotron text-center">
  <h1>DAFTAR BARANG</h1>
</div>
	

	<table class="table table-bordered">
		<thead align="text-center">
			<tr>
				<th width="150">Kode Barang</th>
				<th>Nama Barang</th>
				<th width="175">Satuan</th>
				<th width="175">Harga</th>
				<th width="150">Action</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach($barangs as $barang)
			<tr>
				<td>{{ $barang->kode }}</td>
				<td>{{ $barang->nama }}</td>
				<td>{{ $barang->satuan->satuan }}</td>
				<td>{{ $barang->harga }}</td>
				<td>
					<button class="btn btn-primary btn-sm" onclick="editbarang({{ $barang->id }})">EDIT</button>
					<button class="btn btn-danger btn-sm" onclick="deletebarang({{ $barang->id }})">DELETE</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<button class="btn btn-success" style="margin-bottom: 5px;" data-toggle="modal" data-target="#modalinsert">Tambah Barang</button>
	<button class="btn btn-primary" style="margin-bottom: 5px;" data-toggle="modal" data-target="#modalinsertsatuan">Tambah Satuan</button>
</div>




<!-- Modal Insert-->
<div class="modal fade" id="modalinsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('barang.store') }}" method="POST">
        	{{csrf_field()}}
        	<div class="form-group">
				<label for="kode_brg">Kode Barang</label>
				<input type="text" class="form-control" id="kode_brg" name="kode_brg" placeholder="masukkan kode barang.." required>
			</div>
			<div class="form-group">
				<label for="nama_brg">Nama Barang</label>
				<input type="text" class="form-control" id="nama_brg" name="nama_brg" placeholder="masukkan nama barang.." required>
			</div>
			<div class="form-group">
				<label for="harga_brg">Harga Barang</label>
				<input type="text" class="form-control" id="harga_brg" name="harga_brg" placeholder="masukkan harga barang.." required>
			</div>
			<div class="form-group">
				<label for="satuan">Satuan</label>
				<select class="form-control" id="satuan" name="satuan" required>
					@foreach( $satuans as $satuan )
						<option value="{{ $satuan->id }}">{{ $satuan->satuan }}</option>
					@endforeach
				</select>
			</div>        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Insert Satuan-->
<div class="modal fade" id="modalinsertsatuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('store_satuan') }}" method="POST">
        	{{csrf_field()}}
        	<div class="form-group">
				<input type="text" class="form-control" id="satuan" name="satuan" placeholder="masukkan satuan baru.." required>
			</div>      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus-->
<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Apakah anda yakin ingin mengapus data ini?
		<form action="" method="POST" id="formdelete">
		    	{{csrf_field()}}
		    	{{ method_field('DELETE') }}
		  </div>
		  <div class="modal-footer">
		    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
		    <button type="submit" class="btn btn-danger">Hapus</button>
		  </div>
		</form>
    </div>
  </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="editbody">
       <!-- ajax -->
    </div>
  </div>
</div>




<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script type="text/javascript">
	function editbarang(id){
		var link = "{{url('barang/')}}/"+id+"/edit";
		$.ajax({
			type: 'get',
			url: link,
			success: function(data){
				$('#editbody').html(data);
				$('#modaledit').modal('show');
			},
			error: function(){
			}
		});
	}

	function deletebarang(id){
		$('#formdelete').attr('action', '/barang/'+id);
		$('#modalhapus').modal('show');
	}
</script>
</body>
</html>