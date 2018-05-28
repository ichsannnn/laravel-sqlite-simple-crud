@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col-md-6">
                Siswa
              </div>
              <div class="col-md-6 text-right">
                <button class="btn btn-primary btn-sm tooltiped" data-placement="top" title="Tambah Data Siswa" data-toggle="modal" data-target="#manipulationModal" onclick="create()">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="card-body" id="content-body">
            @include('siswa.table')
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="manipulationModal" tabindex="-1" role="dialog" aria-labelledby="manipulationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Tambah Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" id="button-submit" class="btn btn-primary" onclick="store()">Tambah</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    $(function () {
      $('.tooltiped').tooltip();
    });

    function create() {
      let modal = $('#modal-body');
      $.ajax({
        url: '/create',
        method: 'get',
        success: function(response) {
          initializeModal('Tambah Data Siswa', 'Tambah', 'store()');
          modal.html(response);
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function store() {
      let txtNis = $('#txtNis'),
          txtNama = $('#txtNama'),
          txtKelas = $('#txtKelas'),
          data = { _token: $('meta[name="csrf-token"]').attr('content'), nis: txtNis.val(), nama: txtNama.val(), kelas: txtKelas.val() };
      $.ajax({
        url: '/store',
        method: 'post',
        data: data,
        success: function(response) {
          $('#manipulationModal').modal('hide');
          swal("Siswa", response.message, "success");
          initializeTable(response.html);
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function edit(id) {
      let modal = $('#modal-body');
      $.ajax({
        url: '/edit' + '/' + id,
        method: 'get',
        success: function(response) {
          modal.html(response);
          initializeModal('Ubah Data Siswa', 'Simpan', 'update('+id+')');
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function update(id) {
      let txtNis = $('#txtNis'),
          txtNama = $('#txtNama'),
          txtKelas = $('#txtKelas'),
          data = { _token: $('meta[name="csrf-token"]').attr('content'), id: id, nis: txtNis.val(), nama: txtNama.val(), kelas: txtKelas.val() };
      $.ajax({
        url: '/update',
        method: 'post',
        data: data,
        success: function(response) {
          $('#manipulationModal').modal('hide');
          swal("Siswa", response.message, "success");
          initializeTable(response.html);
        },
        error: function(e) {
          console.log(e);
        }
      });
    }

    function deleteData(id) {
      swal({
        title: "Siswa",
        text: "Hapus Data Siswa?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        html: true,
        closeOnConfirm: false,
        closeOnCancel: true
      },
      function(isConfirm){
        if (isConfirm) {
          $.ajax({
            url: '/delete' + '/' + id,
            method: 'get',
            success: function(response) {
              swal("Siswa", response.message, "success");
              initializeTable(response.html);
            },
            error: function(e) {
              console.log(e);
            }
          });
        }
      });
    }

    function initializeModal(title, btnSubmit, onclick) {
      let modalTitle = $('#modal-title'),
          buttonSubmit = $('#button-submit');
      modalTitle.html(title);
      buttonSubmit.html(btnSubmit);
      buttonSubmit.attr('onclick', onclick);
    }

    function initializeTable(table) {
      let content = $('#content-body');
      content.html(table)
    }
  </script>
@endpush
