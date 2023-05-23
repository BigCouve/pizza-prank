<template>
    <nav>
        <Link :href="'/home'">Home</Link>
        <Link :href="'/audit'">Auditoria</Link>
        <Link :href="'/register'">Cadastrar Usuário</Link>
        <Link :href="'/logout'">Sair da conta</Link>
        Bem vindo(a), {{ username }}.
    </nav>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import axios from 'axios';
    import { ref, onMounted } from 'vue'; 

    const username = ref('');
    onMounted(() => {
        axios.get('/username-session')
        .then((response) => {
            username.value = response.data;
        }).catch((error) => {
            console.log(error);
        });
    })
    
</script>

<style lang="scss" scoped>
    nav{
        text-align: center;
        a{
            margin-right: 2rem;
        }
    }
</style>