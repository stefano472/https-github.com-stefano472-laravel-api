<template>
  <div>
      <h2>
        {{post.title}}
      </h2>
        {{post.slug}}
      <router-link :to="{ name: 'single-blog', params: {slug : post.slug} }">visualizza</router-link>
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