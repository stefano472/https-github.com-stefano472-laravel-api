<template>
    <div class="container">
          <div v-if="post">
              {{post.title}}
          </div>
          <div v-else>
              <p>...caricamento in corso</p>
          </div>
    </div>
</template>

<script>

export default {
    name: 'SingleBlogComponent',
    data(){
        return {
            post: undefined
        }
    },
    created(){
        const id = this.$route.params.id;
        console.log('created with id:', id);
        window.axios.get('http://127.0.0.1:8000/api/posts/' + id)
            .then(({status, data}) => {
                console.log(data.results);
                if(status === 200 && data.success){
                    this.post = data.results
                }
            })
            .catch(e => console.log(e));
    }
}
</script>

<style>

</style>