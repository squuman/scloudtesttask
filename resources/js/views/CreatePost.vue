<template>
    <div class="uk-container">
        <div class="uk-alert-danger" uk-alert v-if="error">
            <a class="uk-alert-close" uk-close></a>
            <p>Проверьте правильность введенный полей</p>
        </div>
        <form style="margin-bottom: 20px;">
            <fieldset class="uk-fieldset">

                <legend class="uk-legend">Опубликовать новость</legend>

                <div class="uk-margin">
                    <input class="uk-input" v-model="form.title" type="text" placeholder="Заголовок">
                </div>

                <div class="uk-margin">
                    <textarea class="uk-textarea" v-model="form.content" rows="5" placeholder="Содержимое"></textarea>
                </div>

                <button class="uk-button uk-button-secondary" @click.prevent="store">
                    <span style="color:white;">Опубликовать</span>
                </button>
            </fieldset>
        </form>
    </div>
</template>

<script>

import axios from "axios";

export default {
    components: {},
    data: () => ({
        form: {
            title: "",
            content: ""
        },
        error: false
    }),
    methods: {
        store() {
            axios.post( "http://127.0.0.1:8000/api/news", this.form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
            .then(response => {
                if (response.status === 201) {
                    this.$router.push('/post?id=' + response.data.id)
                } else {
                    this.error = true
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
