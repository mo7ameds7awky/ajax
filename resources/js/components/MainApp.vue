<template>
    <div>
        <table>
            <thead>
            <tr>Title</tr>
            <tr>Body</tr>
            </thead>
            <tbody>
            <tr v-for="post in posts">
                <td>{{post.title}}</td>
                <td>{{post.body}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "MainApp",
    data(){
        return {
            posts: []
        }
    },
    async created() {
        let res = await axios.get('/posts');
        this.posts = res.data;
    }
}
</script>

<style scoped>

</style>
