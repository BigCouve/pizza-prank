<template>
    <main>
        <header v-if="$attrs.errors['not-found']">
            <h4> {{ $attrs.errors['not-found'] }}</h4>
        </header>
        <form @submit.prevent>
            <h1>Insira suas credenciais</h1>
            <div id="bg-fields">
                <div class="bg-input">
                    <div class="validation-error" v-if="$attrs.errors.email">{{ $attrs.errors.email }}</div>
                    <input v-model="data.email" id="email" name="email" type="text" placeholder=" ">
                    <label class="label-style" for="email">Email</label>
                </div>
                <div class="bg-input">
                    <div class="validation-error" v-if="$attrs.errors.password">{{ $attrs.errors.password }}</div>
                    <input v-model="data.password" id="password" type="password" placeholder=" ">
                    <label class="label-style" for="password">Senha</label>
                </div>
                <button @click="login">Entrar</button>
                <Link :href="'/register'">Ainda não possui conta? Cadastre-se</Link>
            </div>
        </form>
    </main>
</template>
<script setup>
    import { reactive } from 'vue';
    import { router } from '@inertiajs/vue3';
    import { Link } from '@inertiajs/vue3';

    const data = reactive({
        email: '',
        password: '',
    });

    function login() {
        router.post('/login', data)
    };
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
        header{
            position: absolute;
            top: 0;
            background-color: #E6050C;
            border-top: 5px solid red;
            border-bottom: 5px solid red;
            h4{
                width: 100vw;
                text-align: center;
                color: #fff;
                margin: 15px 0px 15px 0px;
            }
        }
        form{
            @include all-centralized-flex();
            @media screen and (max-width: 600px) {
                padding: 1rem 3rem;
                width: 70vw;
                height: 70vh;
                box-shadow: 0px 0px 45vw 20vw hsl(0, 0%, 81%);
            }
            @media screen and (max-width: 1100px) {
                height: 60vh;
            }
            width: 33vw;
            height: 50vh;
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
                    input{
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