<template>
    <div>
        <div v-if="is_found">
            <h1>{{ post.title }} <span class="uk-badge">{{ post.created_at }}</span></h1>
            <p class="uk-text-lead">{{ post.content }}</p>
            <button class="uk-button uk-button-secondary" @click.prevent="goToUpdate">
                <span style="color:white">
                    Редактировать запись
                </span>
            </button>
        </div>

        <div uk-alert v-if="!is_found">
            <h3>404 пост не найден</h3>
        </div>
    </div>
</template>

<script>
export default {
    props: ['id'],
    data: () => ({
        post: undefined,
        is_found: true
    }),
    mounted() {
        this.getPost(this.$route.query.id)
    },
    methods: {
        getPost() {
            let id = this.$route.query.id

            if (id === undefined) {
                this.is_found = false
            }

            axios.get('http://127.0.0.1:8000/api/news/' + id)
                .then(response => {
                    this.post = response.data
                    console.log(this.post)
                })
        },
        goToUpdate() {
            this.$router.push('/edit-post?id=' + this.post.id)
        }
    }
}
</script>

<style scoped>

</style>
