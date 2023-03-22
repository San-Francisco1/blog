<template>
    <span @click="addLike()" class="badge likesButton" :class="isLike ? 'bg-primary' : 'bg-danger'">{{likes}} <i class="far fa-thumbs-up"></i> </span>
</template>

<script>
export default {
    computed: {
        isLike() {
            return this.$store.state.likeIt;
        },
        likes() {
            return this.$store.getters.articleLikes;
        }
    },
    methods: {
        addLike() {
            this.$store.dispatch('addLike', {
                slug: this.$store.state.slug,
                increment: this.isLike
            })
        }
    },
    mounted(){
        console.log('Component article mounted.')
    }
}
</script>

<style scoped>

    .likesButton {
        cursor: pointer;
    }

</style>
