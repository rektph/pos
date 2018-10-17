
// initial state
export const state = { 
    loading: false,
    snackbar: false,
    baseUrl: 'http://laravueprac.test/',
    text: '',
    alerttype: 'info'
}

// getters
export const getters = {
    loading: state => state.loading,
    snackbar: state => state.snackbar,
    baseUrl: state => state.baseUrl,
    text: state => state.text,
    alerttype: state => state.alerttype
}

// actions
export const actions = {
    loadpage: ({commit}) => commit('loadpage'),
    showsnackbar:({commit}) => commit('showsnackbar', payload),
    closesnackbar:({commit}) => commit('closesnackbar')
}

// mutations
export const mutations = {
    loadpage (state) {
        state.loading = !state.loading
    },
    showsnackbar (state, payload) {
        state.snackbar = true
        state.text = payload.text
        state.alerttype = payload.type
        // switch(type) {
        //     case "info":
        //         state.alerttype = type//"info"
        //     break
        //     case "alert":
        //         state.alerttype = type//"primary"
        //     break
        //     case "error":
        //         state.alerttype = type//"red"
        //     break
        // }
    },
    closesnackbar (state) {
        state.snackbar = false
    }
}