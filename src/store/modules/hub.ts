/* eslint-disable @typescript-eslint/no-unused-vars */
/* eslint-disable @typescript-eslint/no-explicit-any */
import * as types from '../mutations'
import SETTINGS from '../../settings'

// initial state
const state = {
  error: null,
  notice: null,
  loading: true,
  loading_progress: 0
}

// getters
const getters = {
  isLoading: (state: { loading_progress: number }) =>
    state.loading_progress < 100,
  loadingProgress: (state: { loading_progress: any }) => state.loading_progress,
  loadingIncrement: () => {
    return 100 / SETTINGS.LOADING_SEGMENTS
  }
}

// actions
const actions = {}

// mutations
const mutations = {
  [types.INCREMENT_LOADING_PROGRESS](
    state: { loading_progress: number },
    val: any
  ) {
    state.loading_progress = Math.min(
      state.loading_progress + getters.loadingIncrement(),
      100
    )
  },

  [types.RESET_LOADING_PROGRESS](state: { loading_progress: number }) {
    state.loading_progress = 0
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
