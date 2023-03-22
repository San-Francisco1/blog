<template>
        <span class="badge bg-danger">{{views}} <i class="far fa-eye"></i> </span>
</template>

<script>
export default {
    computed: {
        views() {
            return this.$store.getters.articleViews;
        }
    },
    mounted(){
        console.log('Component article mounted.')
    }
}
</script>

