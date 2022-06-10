<template>
    <div>
        <div v-for="post in posts" :key='post.id'>
            <PostCardComponent :post='post' />
        </div>
    </div>
</template>

<script>
import PostCardComponent from '../components/PostCardComponent.vue';

export default {
    name: 'PostCardListComponent',
    components: { PostCardComponent },
    props: {
        posts: Array
    }

}
</script>

<style>

</style>