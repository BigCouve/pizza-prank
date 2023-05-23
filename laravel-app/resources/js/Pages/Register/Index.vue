<template>
    <NavBar v-if="$attrs.userName" />
    <main>
        <form @submit.prevent>
            <h1>Cadastre-se no site</h1>
            <div id="bg-fields">
                <div class="bg-input">
                    <div class="validation-error" v-if="$attrs.errors.name">{{ $attrs.errors.name }}</div>
                    <input v-model="data.name" id="name" type="text" placeholder=" ">
                    <label class="label-style" for="name">Nome</label>
                </div>
                <div class="bg-input">
                    <div class="validation-error" v-if="$attrs.errors.email">{{ $attrs.errors.email }}</div>
                    <input v-model="data.email" id="email" type="text" placeholder=" ">
                    <label class="label-style" for="email">Email</label>
                </div>
                <div class="bg-input">
                    <div class="validation-error" v-if="$attrs.errors.password">{{ $attrs.errors.password }}</div>
                    <input v-model="data.password" id="password" type="password" placeholder=" ">
                    <label class="label-style" for="password">Senha</label>
                </div>
                <div v-if="$attrs.userRole === 2" class="bg-input">
                    <select v-model="data.role" id="role" placeholder=" ">
                        <option v-for="(role, key) in props.roles" :value="key+1"> {{ role.name }}</option>
                    </select>
                    <label class="label-style" for="role">Função</label>
                </div>
                <button @click="createUser">Cadastrar</button>
                <Link :href="'/login'">Já possui conta? Entrar</Link>
            </div>
        </form>
    </main>
</template>
<script setup>
    import { Inertia } from "@inertiajs/inertia";
    import { reactive, ref } from 'vue';
    import { Link } from '@inertiajs/vue3'
    import NavBar from '../Components/NavBar.vue';


    const data = reactive({
            name : '',
            email: '',
            password: '',
            role: 1
        }
    )

    const props = defineProps({
        roles: Array,
    })

    function createUser() {
        Inertia.post(`/register`, data);
    }
</script>

<style lang="scss" scoped>
    @mixin all-centralized-flex(){
        display: flex;
        justify-content: center;
        align-items: center;
    }

    main{
        @include all-centralized-flex();
        flex-direction: column;
        position: relative;
        min-height: 100vh;
        background-color: rgb(99, 99, 99);
        form{
            @include all-centralized-flex();
            @media screen and (max-width: 600px) {
                padding: 1rem 3rem;
                width: 70vw;
                min-height: 70vh;
                height: auto;
                box-shadow: 0px 0px 45vw 20vw hsl(0, 0%, 81%);
            }
            @media screen and (max-width: 1100px) {
                height: auto;
                min-height: 70vh;
            }
            width: 33vw;
            min-height: 70vh;
            height: auto;
            flex-wrap: wrap;
            background-color: #fff;
            border: 2px solid hsl(0, 0%, 0%, 0.5);
            box-shadow: 0px 0px 10vw 5vw hsl(0, 0%, 81%);
            border-radius: 5px;
            padding: 2rem 6rem;
            h1{
                text-align: center;
                font-family: 'ZeroProBold', serif;
                color: #333536;
                font-size: 36px;
                font-weight: 800;
                width: 100%;
            }
            #bg-fields{
                @include all-centralized-flex();
                flex-wrap: wrap;
                row-gap: 2rem;
                width: inherit;
                .bg-input{
                    width: 100%;
                    position: relative;
                    label{
                        font-family: Arial, Helvetica, sans-serif;
                        font-size: 1.15rem;
                        position: absolute;
                        top: 27%;
                        left: 4%;
                        color: #C7C7C7;
                        transition: transform 400ms;

                    }
                    select{
                        box-sizing: content-box;
                    }
                    input, select{
                        &:focus + label, &:active + label, &:not(:placeholder-shown) + label{
                            transform: translate(-15%, -180%);
                            font-size: 0.85rem;
                            text-transform: uppercase;
                            color: rgb(0 0 0);
                        }
                        width: 100%;
                        height: 5vh;
                        padding: 5px;
                        background-color: #fafafa;
                        border-radius: 5px;
                        border: 1px solid #cecece;
                    }
                }

                .validation-error{
                    & ~ input{
                        border-color: red;
                    }
                    color: red;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 1rem;
                    text-align: center;
                    top: -1rem;
                    position: absolute;
                    width: 100%;
                    row-gap: 0px;
                }

                button{
                    font-size: 1.2rem;
                    padding: 10px 20px;
                    background-color: #0066ff;
                    color: #ffffff;
                    border-radius: 5px;
                    border-top: 2px solid #4D94FF;
                    border-right: 2px solid #4D94FF;
                    border-left: 2px solid #0052CC;
                    border-bottom: 2px solid #0052CC;
                    transition: box-shadow 400ms;
                    &:hover{
                        cursor: pointer;
                        box-shadow: 2px 1px 17px 0px #003380;
                    }
                }

                a{
                    width: 100%;
                    text-align: center;
                    top: -1rem;
                    position: relative;
                }
            }
        }
        
    }

   
</style>