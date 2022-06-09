<template>
  <div class="container">
      <div class="row text-center">
          <div class="col-12">
                <h1>
                    My blog
                </h1> 
          </div>
          <div v-if="posts.length > 0">

          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: 'NotFoundComponent',
    data(){
        return {
            posts: []
        }
    },
    created(){
        window.axios.get('http://127.0.0.1:8000/api/posts')
            .then(({status, data}) => {
                console.log(results);
                if(status === 200){
                    this.posts = data.results
                }
            })
            .catch(e => console.log(e));
    }
}
</script>

<style>

</style>