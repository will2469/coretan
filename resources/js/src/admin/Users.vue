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
            <a class="btn bg-success btn-flat btn-sm" @click="addUserModal">
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
                    <a
                      href="#"
                      @click="editUserModal(user)"
                      class="btn bg-warning btn-flat btn-sm"
                      title="Ubah"
                    >
                      <i class="fa fa-user-edit icon-white"></i>
                    </a>
                    <a
                      href="#"
                      @click="deleteUser(user.id)"
                      class="btn bg-danger btn-flat btn-sm"
                      title="Ubah"
                    >
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
    <div class="modal fade" id="userModal" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 v-show="editMode" class="modal-title">Ubah Pengguna</h4>
            <h4 v-show="!editMode" class="modal-title">Tambah Pengguna Baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form @submit.prevent="editMode ? updateUser() : createUser()">
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
                  v-show="!editMode"
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
                  <option disabled value>Silahkan Pilih Role..</option>
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
              <button v-show="editMode" type="submit" class="btn btn-warning">Perbaharui</button>
              <button v-show="!editMode" type="submit" class="btn btn-primary">Simpan</button>
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
      editMode: false,
      users: {},
      roles: {},
      form: new Form({
        id: "",
        name: "",
        email: "",
        password: "",
        nik: "",
        roleId: ""
      })
    };
  },
  methods: {
    addUserModal() {
      this.editMode = false;
      this.form.reset();
      $("#userModal").modal("show");
    },
    editUserModal(user) {
      this.editMode = true;
      this.form.reset();
      this.form.clear();
      $("#userModal").modal("show");
      this.form.fill(user);
      this.form.roleId = user.roles[0].id;
    },
    deleteUser(id) {
      Swal.fire({
        title: "Apakah Sudah Yakin Bosku?",
        text: "Data tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Hapus Bosku!"
      }).then(result => {
        //Send the request to the server
        let url = "api/user/" + id;
        this.form
          .delete(url)
          .then(() => {
            if (result.value) {
              Swal.fire("Berhasil!", "Data berhasil dihapus Bosku.", "success");
            }
            Update.$emit("Updated");
          })
          .catch(() => {
            Swal.fire("Gagal!", "Terjadi Kesalahan Bosku", "warning");
          });
      });
    },
    updateUser() {
      this.$Progress.start();
      let url = "api/user/" + this.form.id;
      this.form
        .put(url)
        .then(() => {
          //succes
          $("#addNew").modal("hide");
          Swal.fire("Berhasil!", "Data berhasil diubah Bosku.", "success");

          this.$Progress.finish();

          Update.$emit("Updated");
        })
        .catch(() => {
          //failed
          this.$Progress.fail();
          Swal.fire("Gagal!", "Data gagal diubah Bosku.", "warning");
        });
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
    },
    createUser() {
      this.$Progress.start();
      let url = "api/user";
      this.form
        .post(url)
        .then(() => {
          $("#addNew").modal("hide");

          this.$Toast.fire({
            icon: "success",
            title: "Pengguna baru telah dibuat bosku..."
          });

          this.$Progress.finish();

          Update.$emit("Updated");
        })
        .catch(() => {
          this.$Progress.fail();
          this.$Toast.fire({
            icon: "warning",
            title: "Terdapat kesalahan saat menyimpan data bosku..."
          });
        });
    }
  },
  created() {
    this.loadUsers();
    this.loadRoles();

    Update.$on("Updated", () => {
      this.loadUsers();
    });

    //setInterval(() => this.loadUsers(), 5000); // for realtime update use
  }
};
</script>