<template>
    <div class="uk-container">
        <div class="uk-container">
            <div v-if="current_page > 1">
                <button class="uk-button uk-button-secondary" @click.prevent="go_prev_page">
                    <span style="color:white;"><<<</span>
                </button>
            </div>
            <div v-if="current_page !== last_page">
                <button class="uk-button uk-button-secondary" @click.prevent="go_next_page">
                    <span style="color:white;">>>></span>
                </button>
            </div>
        </div>
        <div style="display: flex; flex-wrap: wrap">
            <v-post
            v-for="post in posts"
            v-bind:key="post.id"
            :id="post.id"
            :title="post.title"
            :content="post.content"
            :created_at="post.created_at"
            />
        </div>
    </div>

</template>

<script>
import axios from 'axios'

export default {
    mounted() {
        this.index()
    },
    data: () => ({
        posts: [],
        pages_count: undefined,
        current_page: undefined,
        last_page: undefined,
    }),
    methods: {
        index(page=1) {
            this.current_page = page
            let url = 'http://127.0.0.1:8000/api/news?page=' + page

            axios.get(url)
                .then(response => {
                    console.log(response.data.data)
                    this.posts = response.data.data
                    this.last_page = response.data.last_page
                })
        },
        go_next_page() {
            this.index(this.current_page + 1)
        },
        go_prev_page() {
            this.index(this.current_page - 1)
        },
    }
}
</script>

<style scoped>
.uk-card {
    width: 40%;
    margin-right: 20px;
    margin-top: 20px;
    margin-bottom: 20px;
}
.uk-card:last-child {
    margin-right: 0;
}
</style>
