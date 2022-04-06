/* eslint-disable @typescript-eslint/no-explicit-any */
import api from '../../api'
import * as types from '../mutations'

// initial state
const state = {
  all: [],
  loaded: false,
  page: null
}

// getters
const getters = {
  allPages: (state: { all: any }) => state.all,
  allPagesLoaded: (state: { loaded: any }) => state.loaded,
  page: (state: { all: any[] }) => (id: any) => {
    const field = typeof id === 'number' ? 'id' : 'slug'
    const page = state.all.filter(
      (page: { [x: string]: any }) => page[field] === id
    )
    return page[0] ? page[0] : false
  },
  pageContent: (state: { all: any[] }) => (id: any) => {
    const field = typeof id === 'number' ? 'id' : 'slug'
    const page = state.all.filter(
      (page: { [x: string]: any }) => page[field] === id
    )

    return page[0] ? page[0].content.rendered : false
  },
  somePages: (state: { all: string | any[] }) => (limit: number) => {
    if (state.all.length < 1) {
      return false
    }
    const all = [...state.all]
    return all.splice(0, Math.min(limit, state.all.length))
  }
}

// actions
const actions = {
  getAllPages({ commit }: any) {
    api.getPages(pages => {
      commit(types.STORE_FETCHED_PAGES, { pages })
      commit(types.PAGES_LOADED, true)
      commit(types.INCREMENT_LOADING_PROGRESS)
    })
  }
}

// mutations
const mutations = {
  [types.STORE_FETCHED_PAGES](state: { all: any }, { pages }: any) {
    state.all = pages
  },

  [types.PAGES_LOADED](state: { loaded: any }, val: any) {
    state.loaded = val
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
