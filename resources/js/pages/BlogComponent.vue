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

              <button v-if="prevPageLink" @click="goPrevPage()">prev</button>
              <button v-if="nextPageLink" @click="goNextPage()">next</button>
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
            posts: [],
            currentPage: 1,
            prevPageLink: '',
            nextPageLink: '',
        }
    },
    created(){
        this.loadPage('http://127.0.0.1:8000/api/posts')
    },
    methods: {
            loadPage(url){
                window.axios.get(url)
                    .then(({status, data}) => {
                        console.log(data.results);
                        if(status === 200 && data.success){
                            this.posts = data.results.data;
                            this.currentPage = data.results.current_page;
                            this.prevPageLink = data.results.prev_page_url;
                            this.nextPageLink = data.results.next_page_url;

                        }
                    })
                    .catch(e => console.log(e));
            },
            goPrevPage(){
                this.loadPage(this.prevPageLink);
            },
            goNextPage(){
                this.loadPage(this.nextPageLink);
            }
    }
}
</script>

<style>

</style>