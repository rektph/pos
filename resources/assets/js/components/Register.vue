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
                            <h3 class="headline mb-0">Register to <strong>LaraVuePractice</strong></h3>
                            <v-divider></v-divider>
                            <v-form>
                                <v-layout row class="pt-2">
                                    <v-flex>
                                        <v-text-field
                                            v-model="fname"
                                            :disabled="loading"
                                            :error-messages="fnameError"
                                            label="First Name"
                                            required />
                                    </v-flex>
                                    <v-flex>
                                        <v-text-field
                                            v-model="lname"
                                            :disabled="loading"
                                            :error-messages="lnameError"
                                            label="Last Name"
                                            required />
                                    </v-flex>
                                </v-layout>
                                <v-text-field
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
                            <v-btn color="primary" tabindex="1" @click="sendUser()">Register</v-btn>
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
        fname: '',
        lname: '',
        email: '',
        password: '',
        fnameError: [],
        lnameError: [],
        passwordError: [],
        emailError: [],
    }),
    methods: { 
        sendUser() {
            this.loading = true
            this.emailError = []
            this.passwordError = []
            axios.post(this.baseUrl + 'api/user/register', {
                email: this.email,
                password: this.password,
                fname: this.fname,
                lname: this.lname
            }).then((res)=>{
                console.log(res.data)
                fname = lname = email = password =  ''
                switch(res.data.status) {
                    case 1:
                        this.$store.commit('extras/changesnackbartext', "wtf")
                        this.$store.dispatch('extras/showsnackbar')
                    break
                    case 1062:
                        this.loading = false
                        this.emailError = 'Email has been already used'
                        return
                    break
                }
            }).catch((error)=>{
                this.loading = false
                this.emailError = ' '
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
