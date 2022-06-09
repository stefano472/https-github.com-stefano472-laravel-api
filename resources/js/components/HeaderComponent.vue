<template>
    <header class="container">
        <nav>
            <ul class="nav">
                <li v-for="(menuItem, index) in menu" :key="index" class="nav-item m-2">
                    <router-link :to="{name: menuItem.route}">{{menuItem.label}}</router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'HeaderComponent',
    data() {
        return {
            menu: [
                {
                    route: 'home',
                    label: 'Home'
                },
                {
                    route: 'blog',
                    label: 'My Posts'
                },
                {
                    route: 'who-we-are',
                    label: 'Who we are'
                },
                {
                    route: 'contacts',
                    label: 'Contacts'
                }
            ]
        }
    }
}
</script>

<style>

</style>