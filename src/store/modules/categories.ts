/* eslint-disable @typescript-eslint/no-explicit-any */
import api from '../../api'
import * as types from '../mutations'

// initial state
const state = {
  all: [],
  loaded: false
}

// getters
const getters = {
  // Returns an array all categories
  allCategories: (state: { all: any }) => state.all,
  allCategoriesLoaded: (state: { loaded: any }) => state.loaded
}

// actions
const actions = {
  getAllCategories({ commit }: any) {
    api.getCategories(categories => {
      commit(types.STORE_FETCHED_CATEGORIES, { categories })
      commit(types.CATEGORIES_LOADED, true)
      commit(types.INCREMENT_LOADING_PROGRESS)
    })
  }
}

// mutations
const mutations = {
  [types.STORE_FETCHED_CATEGORIES](state: { all: any }, { categories }: any) {
    state.all = categories
  },

  [types.CATEGORIES_LOADED](state: { loaded: any }, bool: any) {
    state.loaded = bool
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
