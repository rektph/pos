<template>
    <v-container grid-list-md>
        <v-layout row wrap>
            <v-flex xs3></v-flex>
            <v-flex xs6>
                <v-card>
                    <v-flex class="px-4 pb-4 pt2">    
                        <v-card-title primary-title>
                        <div>
                            <h3 class="headline mb-0">Login</h3>
                            <v-divider></v-divider><br>
                            Kiki
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
    methods: { },
    computed: mapGetters({
        loading: 'extras/loading'
    }),
}
</script>
