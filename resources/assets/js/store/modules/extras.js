
// initial state
export const state = { 
    loading: false,
    snackbar: false,
    baseUrl: 'http://pos.test/',
    text: ''
}

// getters
export const getters = {
    loading: state => state.loading,
    snackbar: state => state.snackbar,
    baseUrl: state => state.baseUrl,
    text: state => state.text
}

// actions
export const actions = {
    loadpage: ({commit}) => commit('loadpage'),
    showsnackbar:({commit}) => commit('showsnackbar'),
    changesnackbartext: ({commit}, text) => commit('changesnackbartext', text)
}

// mutations
export const mutations = {
    loadpage (state) {
        state.loading = !state.loading
    },
    showsnackbar (state) {
        state.snackbar = !state.snackbar
    },
    changesnackbartext (state, text) {
        state.text = text
    }
}