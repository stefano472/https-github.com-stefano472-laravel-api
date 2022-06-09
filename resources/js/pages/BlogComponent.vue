<template>
  <div class="container">
      <div class="row text-center">
          <div class="col-12">
                <h1>
                    My blog
                </h1> 
          </div>
          <div v-if="posts.length > 0">
              <PostCardListComponent :posts='posts' />
          </div>
          <div v-else>
              <p>...caricamento in corso</p>
          </div>
      </div>
  </div>
</template>

<script>
import PostCardListComponent from '../components/PostCardListComponent.vue';

export default {
    name: 'NotFoundComponent',
    components: { PostCardListComponent },
    data(){
        return {
            posts: []
        }
    },
    created(){
        window.axios.get('http://127.0.0.1:8000/api/posts')
            .then(({status, data}) => {
                console.log(data.results);
                if(status === 200 && data.success){
                    this.posts = data.results
                }
            })
            .catch(e => console.log(e));
    }
}
</script>

<style>

</style>