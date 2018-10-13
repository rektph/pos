<template>
    <v-app>
        <navigation v-if="user"></navigation>
        <toolbar v-if="user"></toolbar>
        <v-progress-linear :indeterminate="true" class="ma-0" :active="loading"></v-progress-linear>
        <v-content>
            <transition name="fade" mode="out-in" @beforeLeave="beforeLeave" @enter="enter" @afterEnter="afterEnter">
                <router-view/>
            </transition>
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
    }),
    methods: {
        beforeLeave(element) {
            this.prevHeight = getComputedStyle(element).height;
        },
        enter(element) {
            const { height } = getComputedStyle(element);

            element.style.height = this.prevHeight;

            setTimeout(() => {
                element.style.height = height;
            });
        },
        afterEnter(element) {
            element.style.height = 'auto';
        },
    }
}
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: height, opacity;
  transition-timing-function: ease;
  overflow: hidden;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
.full-width {
    width: 100%;
}
</style>
