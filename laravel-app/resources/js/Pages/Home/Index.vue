<template>
    <header>
        <NavBar />
    </header>
    <h1>Home screen</h1>

    <!-- <button id="start-camera">Start Camera</button> -->
    <video id="video" width="1280" height="1024" autoplay></video>
    <!-- <button id="click-photo">Click Photo</button> -->
    <canvas id="canvas" width="1280" height="1024"></canvas>
</template>

<script setup>
    import NavBar from '../Components/NavBar.vue';
    import { checkInactivity }  from '../../app.js';
    
    checkInactivity();

</script>

<style lang="scss" scoped>

</style>