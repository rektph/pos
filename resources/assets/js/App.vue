<template>
    <v-app>
        <navigation v-if="user"></navigation>
        <toolbar v-if="user"></toolbar>
        <v-progress-linear :indeterminate="true" class="ma-0" v-if="loading"></v-progress-linear>
        <v-content>
            <router-view></router-view>
        </v-content>
        <footer-custom></footer-custom>
    </v-app>
</template>

<script>
import Toolbar from './includes/Toolbar'
import Navigation from './includes/Navigation'
import FooterCustom from './includes/FooterCustom'
import { mapGetters } from 'vuex'

export default {
    name: 'App',
    components: {
        Toolbar,
        Navigation,
        FooterCustom
    },
    computed: mapGetters({
        user: 'auth/user',
        loading: 'extras/loading'
    })
}
</script>

<style>

</style>
