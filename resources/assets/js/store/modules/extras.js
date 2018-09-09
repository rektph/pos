
// initial state
export const state = { 
    loading: false
}

// getters
export const getters = {
    loading: state => state.loading
}

// actions
export const actions = {
    loadpage: ({commit}) => commit('loads')
}

// mutations
export const mutations = {
    loads (state) {
        state.loading = !state.loading
    }
}