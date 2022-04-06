/* eslint-disable @typescript-eslint/no-explicit-any */

import * as types from '../mutations'

// initial state
const state = {
  id: '',
  logged_in: false
}

// getters
const getters = {
  userId: (state: { id: any }) => state.id
}

// actions
const actions = {}

// mutations
const mutations = {
  [types.STORE_FETCHED_USER](state: { id: any }, { uid }: any) {
    state.id = uid
  },

  [types.LOGIN_USER](state: { logged_in: boolean }) {
    state.logged_in = true
  },

  [types.LOGOUT_USER](state: { logged_in: boolean }) {
    state.logged_in = false
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
