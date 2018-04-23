<form action="/barang/{{$barang->id}}" method="POST">
        	{{csrf_field()}}
        	{{ method_field('PUT') }}
        	<div class="form-group">
				<label for="kode_brg">Kode Barang</label>
				<input type="text" class="form-control" id="kode_brg" value="{{ $barang->kode }}" name="kode_brg" placeholder="masukkan kode barang.." required disabled>
			</div>
			<div class="form-group">
				<label for="nama_brg">Nama Barang</label>
				<input type="text" class="form-control" id="nama_brg" value="{{ $barang->nama }}" name="nama_brg" placeholder="masukkan nama barang.." required>
			</div>
			<div class="form-group">
				<label for="harga_brg">Harga Barang</label>
				<input type="text" class="form-control" id="harga_brg" value="{{ $barang->harga }}" name="harga_brg" placeholder="masukkan harga barang.." required>
			</div>
			<div class="form-group">
				<label for="satuan">Satuan Barang</label>
				<select class="form-control" id="satuan" name="satuan" required>
					@foreach( $satuans as $satuan )
						<option value="{{ $satuan->id }}"@if($satuan->id==$barang->satuan->id){{"selected"}}@endif>{{ $satuan->satuan }}</option>
					@endforeach
				</select>
			</div>                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
</form>