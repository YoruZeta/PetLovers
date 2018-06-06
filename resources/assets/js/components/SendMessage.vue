<template>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-footer">
          <form @submit.prevent.keyup="send">
            <div class="form-group">
              <input type="text" class="form-control" v-model="message.message">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Enviar mensaje</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default{
    props: ['user'],
    data(){
      return {
        // Para nuestro modelo de message se llena la propiedad user con el parametro user
        // del componente SendMessage que se esta creando.
        message: {
          message: '',
          user: this.user,
          created_at: ''
        }
      }
    },
    methods: {
      send(){
        this.message.created_at = new Date();
        this.$emit('messagesend', this.message);
        this.message = {}
      }
    }
  }
</script>
