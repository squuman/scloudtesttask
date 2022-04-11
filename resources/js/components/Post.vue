<template>
    <div class="uk-card uk-card-default uk-width-1-2@m">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">{{ title }}</h3>
                    <p class="uk-text-meta uk-margin-remove-top">
                        <time datetime="2016-04-01T19:00">{{ created_at }}</time>
                    </p>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <p>{{ content }}</p>
        </div>
        <div class="uk-card-footer">
            <button class="uk-button uk-button-secondary" @click.prevent="show(id)">
                <span style="color:white">
                    Read more
                </span>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: {
            type: Number,
            default: null,
        },
        title: {
            type: String,
            default: null,
        },
        content: {
            type: String,
            default: null,
        },
        created_at: {
            type: String,
            default: null,
        },
    },
    methods: {
        show(id) {
            this.$router.push('/post?id=' + id)
        },
    }
}
</script>

<style scoped>

</style>
