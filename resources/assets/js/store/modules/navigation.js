
// initial state
const state = { 
    drawer: false,
    items: [
        { title: 'Home', icon: 'dashboard' },
        { title: 'About', icon: 'question_answer' }
    ]
}

// getters
const getters = {
    getDrawer: state => state.drawer,
    getItems: state => state.items
}

// actions
const actions = {
    changeDrawer: ({commit}) => commit('showDrawer')
}

// mutations
const mutations = {
    showDrawer(state) {
        state.drawer = !state.drawer
    }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}