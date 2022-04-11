<template>
    <div class="uk-card uk-card-default uk-width-1-2@m mt-5">
        <div class="uk-alert-success" uk-alert v-if="is_delete">
            <a class="uk-alert-success" uk-close></a>
            <p>Запись удалена</p>
        </div>
        <div class="uk-alert-success" uk-alert v-if="is_update">
            <a class="uk-alert-success" uk-close></a>
            <p>Запись изменена</p>
        </div>
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <input class="uk-input" v-model="form.title"
                           type="text" placeholder="Заголовок">
                    <p class="uk-text-meta uk-margin-remove-top">
                        <time datetime="2016-04-01T19:00">{{ post.created_at }}</time>
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <textarea  class="uk-input" v-model="form.content"
                   type="text" placeholder="Контент">
            </textarea>
        </div>
        <div class="uk-card-footer">
            <button class="uk-button uk-button-secondary" @click.prevent="update">
                <span style="color:white">
                    Сохранить изменения
                </span>
            </button>
            <button class="uk-button uk-button-danger" @click.prevent="destroy">
                <span style="color:white">
                    Удалить запись
                </span>
            </button>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data: () => ({
        post: {},
        form: {
            title: "",
            content: ""
        },
    }),
    mounted() {
        this.index(this.$route.query.id)
    },
    methods: {
        index(id) {
            axios.get('http://127.0.0.1:8000/api/news/' + id)
            .then(response => {
                this.post = response.data
                this.form.title = response.data.title
                this.form.content = response.data.content
            })
        },
        update() {
            axios.put('http://127.0.0.1:8000/api/news/' + this.post.id, this.form)
            .then(response => {
                if (response.data) {
                    this.$router.push('/post?id=' + this.post.id)
                }
            })
        },
        destroy() {
            axios.delete('http://127.0.0.1:8000/api/news/' + this.post.id)
            .then(response => {
                if  (response.status === 204) {
                    this.$router.push('/news')
                }
            })
        },
    }
}
</script>

<style scoped>

</style>
