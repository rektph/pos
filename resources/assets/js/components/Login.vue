<template>
    <v-container grid-list-md>
        <v-layout row wrap>
            <v-flex xs3></v-flex>
            <v-flex xs6>
                <v-card>
                    <v-progress-linear :indeterminate="true" class="ma-0" :active="loading"></v-progress-linear>
                    <v-flex class="px-4 pb-4 pt2">    
                        <v-card-title primary-title>
                        <div class="full-width">
                            <h3 class="headline mb-0">Login to <strong>LaraVuePractice</strong></h3>
                            <v-divider></v-divider>
                            <v-form v-model="valid">
                                <v-text-field
                                    class="pt-2"
                                    v-model="email"
                                    :disabled="loading"
                                    :error-messages="emailError"
                                    label="E-mail"
                                    required />
                                <v-text-field
                                    v-model="password"
                                    :disabled="loading"
                                    :error-messages="passwordError"
                                    label="Password"
                                    type="password"
                                    required />
                            </v-form>
                        </div>
                        </v-card-title>

                        <v-card-actions>
                            <v-spacer/>
                            <v-btn color="primary" tabindex="1" :loading="loading" @click="sendUser()">Login</v-btn>
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
    name: 'Login',
    data: () => ({
        loading: false,
        valid: false,
        email: '',
        password: '',
        passwordError: [],
        emailError: []
    }),
    methods: { 
        sendUser() {
            this.loading = true
            this.emailError = []
            this.passwordError = []
            axios.post(this.baseUrl + 'api/user/login', {
                email: this.email,
                password: this.password
            }).then((res)=>{
                if(!res.data.status) {
                    this.loading = false
                    this.emailError = ' '
                    this.passwordError = 'Invalid Inputs.'
                    return
                }
                
            }).catch((error)=>{
                this.loading = false
                this.passwordError = 'An Error has occured.'
                console.log(error)
            })
        }
    },
    computed: mapGetters({
        // loading: 'extras/loading'
        baseUrl: 'extras/baseUrl'
    }),
}
</script>

<style scoped>
.full-width {
    width: 100%;
}
</style>
