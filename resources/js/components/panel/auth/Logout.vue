<template>

</template>

<script>
export default {
    name: "Logout",
    created() {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
        Toast.fire({
            icon:'success',
            title:'Çıkış İşlemi Başarılı'
        })
        this.$router.push({name:'/'})
    }
}
</script>

<style scoped>

</style>
