<template>
    <div class="row">
        <form @submit.prevent="submit_form()" v-if="!commentSuccess">
            <div class="mb-3">
                <label for="commentSubject" class="form-label">Тема комментария</label>
                <input type="text" class="form-control" id="commentSubject" v-model="subject">
                <div class="alert alert-warning" role="alert" v-if="errorMessage.subject">
                    {{errorMessage.subject[0]}}
                </div>
            </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">Комментарий</label>
                <textarea class="form-control" id="commentBody" rows="3" v-model="body"></textarea>
                <div class="alert alert-warning" role="alert" v-if="errorMessage.body">
                    {{errorMessage.body[0]}}
                </div>
            </div>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
        <div class="alert alert-success" role="alert" v-else>
            Комментарий успешно отправлен!
        </div>
        <div class="my_toast-container pb-1 mt-1 mx-auto" style="min-width: 100%;" v-for="comment in comments">
            <div class="my_toast showing" style="min-width: 100%;">
                <div class="my_toast-header">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg" class="rounded me-2" alt="...">
                    <strong class="me-auto">{{comment.subject}}</strong>
                    <small class="text-muted">{{comment.created_at}}</small>
                </div>
                <div class="my_toast-body">
                    {{comment.body}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            subject: '',
            body: '',
        }
    },
    computed: {
        comments() {
            return this.$store.state.article.article.comments;
        },
        commentSuccess() {
            return this.$store.state.article.commentSuccess;
        },
        errorMessage() {
            return this.$store.state.article.errors;
        },
    },
    methods: {
        submit_form() {
            this.$store.dispatch('article/addComment',{
                subject: this.subject,
                body: this.body,
                article_id: this.$store.state.article.article.id,
            })
        }
    },
    mounted() {
        console.log("Comments component mounted")
    }
}
</script>

<style scoped>

</style>
