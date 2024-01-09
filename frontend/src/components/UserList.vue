<script>
export default {
  data() {
    return {
      users: []
    }
  },
  async mounted() {
    const response = await fetch("http://localhost/user/");
    this.users = await response.json()
  }
}
</script>
<template>
  <h1>User index</h1>

  <table class="table">
    <thead>
    <tr>
      <th>Id</th>
      <th>username</th>
      <th>Roles</th>
      <th>Password</th>
      <th>User_fathername</th>
      <th>User_surname</th>
      <th>User_phoneno_prim</th>
      <th>User_email_prim</th>
      <th>User_mobile_prim</th>
      <th>actions</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="user in users">
      <td>{{ user.id }}</td>
      <td>{{ user.user_name }}</td>
      <td>{{ user.roles }}</td>
      <td>{{ user.password }}</td>
      <td>{{ user.user_fathername }}</td>
      <td>{{ user.user_surname }}</td>
      <td>{{ user.user_phoneno_prim }}</td>
      <td>{{ user.user_email_prim }}</td>
      <td>{{ user.user_mobile_prim }}</td>
      <td>
        <a href="#">show</a>
        <a href="#">edit</a>
      </td>
    </tr>
    <tr v-if="users.length === 0">
      <td colspan="10">no records found</td>
    </tr>
    </tbody>
  </table>
</template>
