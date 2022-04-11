<template>
    <nav class="uk-navbar-container">
        <div class="uk-navbar-left uk-container">
            <ul class="uk-navbar-nav">
                <li v-for="link in links">
                    <router-link :to="link.href"> {{ link.title }} </router-link>
                </li>
            </ul>

        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            links: [
                {
                    title: "Новости",
                    href: "/news"
                },
                {
                    title: "testRoutes",
                    href: "/test"
                },
                {
                    title: "Создать новость",
                    href: "/create-post"
                }
            ]
        }
    }
}
</script>

<style scoped>

</style>
