/* eslint-disable array-callback-return */
/* eslint-disable @typescript-eslint/no-explicit-any */
import api from '../../api'
import * as types from '../mutations'

const createPostSlug = (post: { link: string; slug: any }) => {
  const slug = post.link.replace(
    window.location.protocol + '//' + window.location.host,
    ''
  )
  post.slug = slug
  return post
}

// initial state
const state = {
  recent: [],
  loaded: false
}

// getters
const getters = {
  recentPosts: (state: { recent: any }) => (limit: unknown) => {
    if (!limit || !Number.isInteger(limit) || typeof limit === 'undefined') {
      return state.recent
    }
    const recent = state.recent
    return recent.slice(0, limit)
  },

  recentPostsLoaded: (state: { loaded: any }) => state.loaded
}

// actions
const actions = {
  getPosts({ commit }: any, { limit }: any) {
    api.getPosts(limit, posts => {
      posts.map((post: any, i: string | number) => {
        posts[i] = createPostSlug(post)
      })

      commit(types.STORE_FETCHED_POSTS, { posts })
      commit(types.POSTS_LOADED, true)
      commit(types.INCREMENT_LOADING_PROGRESS)
    })
  }
}

// mutations
const mutations = {
  [types.STORE_FETCHED_POSTS](state: { recent: any }, { posts }: any) {
    state.recent = posts
  },

  [types.POSTS_LOADED](state: { loaded: any }, val: any) {
    state.loaded = val
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
