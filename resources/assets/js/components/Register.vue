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
                                <v-layout row class="pt-2">
                                    <v-flex>
                                        <v-text-field
                                            v-model="password"
                                            :disabled="loading"
                                            :error-messages="passwordError"
                                            label="Password"
                                            type="password"
                                            required />
                                    </v-flex>
                                    <v-flex>
                                        <v-text-field
                                            v-model="confpassword"
                                            :disabled="loading"
                                            :error-messages="confpasswordError"
                                            label="Confirm Password"
                                            type="password"
                                            required />
                                    </v-flex>
                                </v-layout>
                                
                            </v-form>
                        </div>
                        </v-card-title>

                        <v-card-actions>
                            <v-spacer/>
                            <v-btn color="primary" tabindex="1" :loading="loading" @click="sendUser()">Register</v-btn>
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
        confpassword: '',
        fnameError: [],
        lnameError: [],
        passwordError: [],
        confpasswordError: [],
        emailError: [],
    }),
    methods: { 
        sendUser() {
            this.loading = true
            this.emailError = []
            this.passwordError = []
            this.confpasswordError = []
            this.fnameError = []
            this.lnameError = []
            axios.post(this.baseUrl + 'api/user/register', {
                email: this.email,
                password: this.password,
                confpassword: this.confpassword,
                fname: this.fname,
                lname: this.lname
            }).then((res)=>{
                console.log(res.data)
                switch(res.data.status) {
                    case 1:
                        this.loading = false
                        this.$store.commit('snackbar/showSnack', {"text":"Success", "icon":"info", "color":"green"})
                    break
                    case 2:
                        this.loading = false
                        if("email" in res.data.errors) {
                            this.emailError = res.data.errors.email[0]
                        }
                        if("confpassword" in res.data.errors) {
                            this.confpasswordError = res.data.errors.confpassword[0]
                        }
                        if("password" in res.data.errors) {
                            this.passwordError = res.data.errors.password[0]
                        }
                        if("fname" in res.data.errors) {
                            this.fnameError = res.data.errors.fname[0]
                        }
                        if("lname" in res.data.errors) {
                            this.lnameError = res.data.errors.lname[0]
                        }
                        this.$store.commit('snackbar/showSnack', {"text":"Validation Failed", "icon":"warning", "color":"red"})
                    break
                    case 1062:
                        this.loading = false
                        this.emailError = 'Email has been already used'
                        this.$store.commit('snackbar/showSnack', {"text":"Error Occured", "icon":"warning", "color":"red"})
                        return
                    break
                }
            }).catch((error)=>{
                this.loading = false
                this.$store.commit('snackbar/showSnack', {"text":"Error Occured", "icon":"warning", "color":"red"})
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
