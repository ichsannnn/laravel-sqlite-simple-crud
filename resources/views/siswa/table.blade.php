<table class="table table-bordered">
  <thead>
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">NIS</th>
      <th class="text-center" scope="col">Nama</th>
      <th class="text-center" scope="col">Kelas</th>
      <th class="text-center" scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    @php
      $no = 1;
    @endphp
    @foreach ($data as $value)
      <tr>
        <td class="text-center">{{ $no++ }}</td>
        <td>{{ $value->nis }}</td>
        <td>{{ $value->nama }}</td>
        <td>{{ $value->kelas }}</td>
        <td class="text-center">
          <button class="btn btn-success btn-sm tooltiped" data-placement="top" title="Ubah Data Siswa" data-toggle="modal" data-target="#manipulationModal" onclick="edit('{{ $value->id }}')">
            <i class="fa fa-edit"></i>
          </button>
          <button class="btn btn-danger btn-sm tooltiped" data-placement="top" title="Hapus Data Siswa" onclick="deleteData('{{ $value->id }}')">
            <i class="fa fa-trash"></i>
          </button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
