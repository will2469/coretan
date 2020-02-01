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
                <tr v-for="user in users" :key="user.id">
                  <td>{{user.id}}</td>
                  <td>
                    <a href="#" class="btn bg-warning btn-flat btn-sm" title="Ubah">
                      <i class="fa fa-user-edit icon-white"></i>
                    </a>
                    <a href="#" class="btn bg-danger btn-flat btn-sm" title="Ubah">
                      <i class="fa fa-user-times icon-white"></i>
                    </a>
                  </td>
                  <td>{{user.name}}</td>
                  <td>{{user.email}}</td>
                  <td>{{user.nik}}</td>
                  <td>{{getRoles(user.roles)}}</td>
                  <td>
                    <span v-if="user.isOnline" class="badge bg-success">online</span>
                    <span v-else class="badge bg-danger">offline</span>
                  </td>
                  <td>{{user.last_online_at}}</td>
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
                <select v-model="form.roleId" name="roleId" id="roleId" class="form-control">
                  <option value>Silahkan Pilih Role..</option>
                  <option
                    v-for="role in roles"
                    :key="role.id"
                    v-bind:value="role.id"
                  >{{ role.name }}</option>
                </select>
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
      users: {},
      roles: {},
      form: new Form({
        name: "",
        email: "",
        password: "",
        nik: "",
        roleId: ""
      })
    };
  },
  methods: {
    createUser() {
      this.$Progress.start();
      let url = "api/user";
      this.form.post(url);

      $("#addNew").modal("hide");

      this.$Toast.fire({
        icon: "success",
        title: "Pengguna baru telah dibuat bosku..."
      });

      this.$Progress.finish();
    },
    loadUsers() {
      axios.get("api/user").then(({ data }) => (this.users = data));
    },
    loadRoles: function() {
      let url = "api/role";
      axios.get(url).then(({ data }) => {
        // console.log(response)
        // set your form data not sure of the correct form from above but same idea
        this.roles = data; // however the response is formatted from Laravel may differ
      });
    },
    getRoles: function(roles) {
      let rolesString = "";

      roles.forEach((role, index) => {
        if (index != 0) rolesString += ", ";
        rolesString = rolesString + role.name;
      });
      return rolesString;
    }
  },
  created() {
    this.loadUsers();
    this.loadRoles();
  }
};
</script>