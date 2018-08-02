<template>
  <table class="table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th><h5>Fecha</h5></th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="match in matches">
          <td><a v-bind:href="'/messages/' + match.id">{{match.the_other.name}}</a></td>
          <td>{{match.created_at}}</td>
          <td>{{ (match.the_other.isOnline) ? 'Online': 'Desconectado' }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default{
  props: ['matches'],
  mounted(){
    this.$parent.$on('on_init_connected_users', (users) =>{
      users.forEach((u) =>{
        this.matches.forEach((m,i) => {
          if(u.id == m.the_other.id){
            m.the_other.isOnline = true;
            this.matches[i] = m;
            this.$forceUpdate()
          }
        })
      });

    })
    this.$parent.$on('on_user_joinned', (user) => {
      this.matches.forEach((m,i) => {
        if(user.id == m.the_other.id){
          m.the_other.isOnline = true;
            this.matches[i] = m;
            this.$forceUpdate()
        }
      })

    })
    this.$parent.$on('on_user_leaving', (user) =>{
      this.matches.forEach((m,i) => {
        if(user.id == m.the_other.id){
          m.the_other.isOnline = false;
            this.matches[i] = m;
          this.$forceUpdate()
        }
      })
    })
  }
}
</script>
