<template>
    <v-toolbar app :clipped-left=true color="primary">
        <v-toolbar-side-icon @click="changeDrawer"></v-toolbar-side-icon>

        <v-toolbar-title class="white--text">POS</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-btn icon>
            <v-icon>more_vert</v-icon>
        </v-btn>
    </v-toolbar>
</template>
<script>
import { mapState, mapActions } from 'vuex'

export default {
    name: 'Toolbar',
    data () {
        return {
            localDrawer: null
        }
    },
    methods: mapActions('navigation',[
        'changeDrawer'
    ])
}
</script>