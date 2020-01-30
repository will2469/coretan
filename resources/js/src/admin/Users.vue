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
          </div>
          <!-- /.card-header -->

          <div class="box-header with-border">
            <a
              class="btn bg-success btn-flat btn-sm"
              title="Add New"
              data-toggle="modal"
              data-target="#addNew"
            >
              Tambah Baru
              <i class="fa fa-user-edit icon-white"></i>
            </a>
          </div>

          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Aksi</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>NIK</th>
                  <th>Role</th>
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
          <form @submit.prevent="createUser">
            <div class="modal-body">
              <div class="form-group">
                <input
                  v-model="form.name"
                  type="text"
                  class="form-control"
                  name="name"
                  placeholder="Masukkan Nama Pengguna..."
                  :class="{ 'is-invalid': form.errors.has('name') }"
                />
                <has-error :form="form" field="name"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.email"
                  type="email"
                  class="form-control"
                  name="email"
                  placeholder="Masukkan Alamat Email..."
                  :class="{ 'is-invalid': form.errors.has('email') }"
                />
                <has-error :form="form" field="email"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.password"
                  type="password"
                  class="form-control"
                  name="password"
                  placeholder="Masukkan Kata Sandi..."
                  :class="{ 'is-invalid': form.errors.has('password') }"
                />
                <has-error :form="form" field="password"></has-error>
              </div>
              <div class="form-group">
                <input
                  v-model="form.nik"
                  type="number"
                  class="form-control"
                  name="nik"
                  placeholder="Masukkan NIK..."
                  :class="{ 'is-invalid': form.errors.has('nik') }"
                />
                <has-error :form="form" field="nik"></has-error>
              </div>
              <div class="form-group">
                <select
                  name="role"
                  v-model="form.role"
                  id="role"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('role') }"
                >
                  <option value>Pilih Role</option>
                  <option value="1">Kepala Desa</option>
                  <option value="2">Sekretaris Desa</option>
                  <option value="3">Kaur Umum dan Perencanaan</option>
                  <option value="4">Kaur Keuangan</option>
                  <option value="5">Kasi Pemerintahan</option>
                  <option value="6">Kasi Kesejahteraan dan Pelayanan</option>
                  <option value="7">Kadus I</option>
                  <option value="8">Kadus II</option>
                  <option value="9">BPD</option>
                  <option value="10">Lembaga Desa</option>
                  <option value="11">Penduduk</option>
                  <option value="10">Pengunjung</option>
                </select>
                <has-error :form="form" field="role"></has-error>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        name: "",
        email: "",
        password: "",
        nik: "",
        role: "",
        photo: ""
      })
    };
  },
  methods: {
    createUser() {
      this.form.post('api/user');
    }
  }
};
</script>