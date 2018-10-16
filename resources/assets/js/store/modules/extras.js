
// initial state
export const state = { 
    loading: false,
    baseUrl: 'http://pos.test/'
}

// getters
export const getters = {
    loading: state => state.loading,
    baseUrl: state => state.baseUrl
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