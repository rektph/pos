<template>
    <v-app>
        <navigation></navigation>
        <toolbar></toolbar>
        <v-content>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-content>
        <v-footer app></v-footer>
    </v-app>
</template>

<script>
import Toolbar from './includes/Toolbar'
import Navigation from './includes/Navigation'

export default {
    name: 'App',
    components: {
        Toolbar,
        Navigation
    }
}
</script>
