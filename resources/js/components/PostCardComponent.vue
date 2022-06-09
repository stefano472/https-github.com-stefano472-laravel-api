<template>
  <div>
      {{post.title}}
  </div>
</template>

<script>
export default {
    name: 'PostCardComponent',
    props: {
        post: Object
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