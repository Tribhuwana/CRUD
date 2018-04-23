Apakah anda yakin ingin mengapus jadwal ini?
<form action="/jadwal/{{$id}}" method="POST" >
        	{{csrf_field()}}
        	{{ method_field('DELETE') }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
</form>