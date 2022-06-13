<template>
  <div class="container">
      <div class="row text-center">
          <div class="col-12">
            <div v-if="success" class="alert  alert-success" role="alert">
                messaggio inviato correttamente
            </div>
            <form method="post" @submit.prevent="sendForm()">
                <div>
                    <label for="name">Name:</label>
                    <input v-model="name" type="text" name="name">
                    <div v-if="errors && errors.name">
                        <ul>
                            <li v-for="(error, index) in errors.name" :key="'error_name_' + index">
                                {{error}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input v-model="email" type="email" name="email">
                    <div v-if="errors && errors.email">
                        <ul>
                            <li v-for="(error, index) in errors.email" :key="'error_email_' + index">
                                {{error}}
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <label for="message">Message:</label>
                    <textarea v-model="message" name="message" cols="30" rows="10"></textarea>
                    <div v-if="errors && errors.message">
                        <ul>
                            <li v-for="(error, index) in errors.message" :key="'error_message_' + index">
                                {{error}}
                            </li>
                        </ul>
                    </div>
                </div>
                <button type="submit" :disabled='sending'>invia</button>
            </form>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'Contacts',
    data(){
        return{
            name: '',
            email: '',
            message: '',
            sending: false,
            success: false,
            errors: undefined
        }
    },
    methods: {
        sendForm() {
            this.sending= true;
            this.success= false;

            window.axios.post('/api/contacts', {
                    name: this.name,
                    email: this.email,
                    message: this.message
                }).then(({data, status}) => {

                    console.log(data);

                    if (status === 200){
                        this.success = data.success;
                        if (!this.success){
                            this.sending=false;
                            this.errors = data.errors;
                            console.log(this.errors)
                        }else {
                            this.name = '';
                            this.email = '';
                            this.message = '';
                        }
                    }

                }).catch(e => console.log(e))
        }
    }
}
</script>

<style>

</style>