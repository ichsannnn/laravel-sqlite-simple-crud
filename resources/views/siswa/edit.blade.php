<form id="form-siswa">
  <input type="hidden" id="id" value="{{ $data->id }}">
  <input type="hidden" id="method" value="edit">
  <div class="form-group">
    <label for="txtNis">NIS</label>
    <input type="text" class="form-control" id="txtNis" placeholder="NIS" value="{{ $data->nis }}">
  </div>
  <div class="form-group">
    <label for="txtNama">Nama</label>
    <input type="text" class="form-control" id="txtNama" placeholder="Nama" value="{{ $data->nama }}">
  </div>
  <div class="form-group">
    <label for="txtKelas">Kelas</label>
    <input type="text" class="form-control" id="txtKelas" placeholder="Kelas" value="{{ $data->kelas }}">
  </div>
</form>
