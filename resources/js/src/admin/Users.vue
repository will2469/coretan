<template>
  <div class="container">
    <div class="row md-5">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pengaturan Pengguna</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input
                  type="text"
                  name="table_search"
                  class="form-control float-right"
                  placeholder="Cari"
                />

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="box-header with-border">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>
                      <button
                        type="button"
                        class="btn btn-block bg-gradient-success btn-lg font-white"
                        data-toggle="modal"
                        data-target="#addNew"
                      >
                        Tambah Baru
                        <i class="fas fa-user-plus icon-white"></i>
                      </button>
                    </th>
                    <th>
                      <button
                        type="button"
                        class="btn btn-block bg-gradient-success btn-lg font-white"
                      >Success</button>
                    </th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <!-- /.card-header -->

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>NIK</th>
                  <th>Status</th>
                  <th>Terakhir Login</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>183</td>
                  <td>
                    <a href="#" class="btn bg-warning btn-flat btn-sm" title="Ubah">
                      <i class="fa fa-user-edit icon-white"></i>
                    </a>
                    <a href="#" class="btn bg-danger btn-flat btn-sm" title="Ubah">
                      <i class="fa fa-user-times icon-white"></i>
                    </a>
                  </td>
                  <td>11-7-2014</td>
                  <td>
                    <span class="tag tag-success">Approved</span>
                  </td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                  <td>183</td>
                  <td>183</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>

    <!-- modal add new user -->
    <div class="modal fade" id="addNew" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Pengguna Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <p>One fine body…</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</template>