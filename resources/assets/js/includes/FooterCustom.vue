<template>
  <v-footer
    app
    height="auto"
    color="primary lighten-1"
  >
    <v-layout
      justify-center
      row
      wrap
    >
      <v-btn
        v-for="link in links"
        :key="link.key"
        color="white"
        flat
        round
        :to="link.to"
      >
        {{ link.name }}
      </v-btn>
      <v-flex
        primary
        lighten-2
        py-3
        text-xs-center
        white--text
        xs12
      >
        &copy;2018 — <strong>POS</strong>
      </v-flex>
    </v-layout>
  </v-footer>
</template>

<script>
  export default {
    name: 'FooterCustom',
    data: () => ({
      links: [
        {
          name: 'Home',
          to: '/'
        },
        {
          name: 'About Us',
          to: '/about'
        },
        {
          name: 'Services',
          to: '/services'
        },
        {
          name: 'Blog',
          to: '/blog'
        },
        {
          name: 'Contact Us',
          to: '/contact'
        },
        {
          name: 'Register',
          to: '/register'
        },
        {
          name: 'Login',
          to: '/login'
        }
      ]
    }),
    methods: { }
  }
</script>