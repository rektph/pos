<template>
    <v-container grid-list-md>
        <v-layout row wrap>
            <v-flex xs3></v-flex>
            <v-flex xs6>
                <v-card>
                    <v-flex class="px-4 pb-4 pt2">
                        <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Welcome to <strong>POS</strong></h3>
                            <v-divider></v-divider><br>
                            <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis maxime, esse laudantium, accusamus sed minima neque tempore fugit iste iure necessitatibus error temporibus. Quod animi maxime eaque adipisci cum dicta.</div>
                        </div>
                        </v-card-title>
                        <v-card-actions>
                        <v-btn flat color="primary" to="/login">Login</v-btn>
                        <v-btn flat color="primary">Signup</v-btn>
                        </v-card-actions>
                    </v-flex>
                </v-card>
            </v-flex>
            <v-flex xs3></v-flex>
        </v-layout>
    </v-container>
</template>

<script>
import { mapActions } from "vuex";

export default {
    name: 'HomeComponent',
    methods: { }
}
</script>
