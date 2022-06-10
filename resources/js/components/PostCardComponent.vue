<template>
  <div>
      <h3>
        {{post.title}}
      </h3>
      <router-link :to="{ name: 'single-blog', params: {id : post.id} }">visualizza</router-link>
  </div>
</template>

<script>
export default {
    name: 'PostCardComponent',
    props: {
        post: Object,
    },
    computed: {
        trimmedContent(){
            const shortContent = this.content.length > 20 ? this.substring(0,20): this.content;

            return shortContent;
        }
    }

}
</script>

<style>

</style>