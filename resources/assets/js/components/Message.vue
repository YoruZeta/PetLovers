<template>
  <div>
  <h1 class="text-center">Mensajes: {{other.name}} ({{ (other.isOnline) ? 'Online' : 'Desconectado' }}) </h1>
  <!-- Vuejs [componente :atributo=variable] -->
  <div class="row">
    <div class="col-md-12 col-md-offset-2">
      <div class="panel panel-default" v-for="message in messages">
        <div class="panel-heading">
          <strong>{{ message.user.name }}</strong>
        </div>
          <div class="panel-body">
            <p>{{ message.message }}</p>
            <p class="float-right">{{ mom(message.created_at).fromNow() }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>

  export default{
    props: ['messages','other'],
    mounted() {

      this.$parent.$on('on_init_connected_users', (users) =>{
        console.log(this.other);
        users.forEach((u) =>{
          if(u.id == this.other.id){
            this.other.isOnline = true;
            this.$forceUpdate()
          }
        })

        console.log(users);
      })
      this.$parent.$on('on_user_joinned', (user) => {
        if(user.id == this.other.id){
          this.other.isOnline = true;
          this.$forceUpdate()
        }
        console.log(user);
      })
      this.$parent.$on('on_user_leaving', (user) =>{
        if(user.id == this.other.id){
          this.other.isOnline = false;
          this.$forceUpdate()
        }
        console.log(user);
      })
    },
    methods: {
      mom: require('moment'),
      notifyUserStatus: function(user,isOnline){
        console.log(user);
      }
    },watch:{
      messages: function(val){
        console.log(val[0].created_at);
      }
    }
  }
</script>

<style scoped>
  .panel{
    margin-bottom: 0;
  }
</style>
