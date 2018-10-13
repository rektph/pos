<template>
    <v-container grid-list-md>
        <v-layout row wrap>
            <v-flex xs3></v-flex>
            <v-flex xs6>
                <v-card>
                    <v-flex class="px-4 pb-4 pt2">    
                        <v-card-title primary-title>
                        <div class="full-width">
                            <h3 class="headline mb-0">Login to <strong>POS</strong></h3>
                            <v-divider></v-divider>
                            <v-form v-model="valid">
                                <v-text-field
                                    class="pt-2"
                                    v-model="email"
                                    label="E-mail"
                                    required />
                                <v-text-field
                                    class="pt-2 pb-2"
                                    v-model="password"
                                    :rules="errorRules"
                                    label="Password"
                                    type="password"
                                    required />
                            </v-form>
                        </div>
                        </v-card-title>

                        <v-card-actions>
                            <v-spacer/>
                            <v-btn color="primary" tabindex="1" :disabled="loading">Login</v-btn>
                        </v-card-actions>
                    </v-flex>
                </v-card>
            </v-flex>
            <v-flex xs3></v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import { mapActions, mapGetters } from "vuex";

export default {
    name: 'LoginComponent',
    data: () => ({
      valid: false,
      password: '',
      passwordRules: [
        v => !!v || 'Password is required'
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid'
      ]
    }),
    methods: { },
    computed: mapGetters({
        loading: 'extras/loading'
    }),
}
</script>
