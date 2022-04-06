/* eslint-disable @typescript-eslint/no-explicit-any */
import axios from 'axios'
import SETTINGS from '../settings'

export default {
  getCategories(cb: { (categories: any): void, (arg0: any): void }) {
    axios
      .get(
        SETTINGS.API_BASE_PATH +
          'categories?sort=name&hide_empty=true&per_page=50'
      )
      .then((response: { data: any[]}) => {
        cb(response.data.filter(c => c.name !== 'Uncategorized'))
      })
      .catch((e: any) => {
        cb(e)
      })
  },

  getPages(cb: { (pages: any): void, (arg0: any): void }) {
    axios
      .get(SETTINGS.API_BASE_PATH + 'pages?per_page=10')
      .then((response: { data: any }) => {
        cb(response.data)
      })
      .catch((e: any) => {
        cb(e)
      })
  },

  getPage(id: unknown, cb: (arg0: any) => void) {
    if(!Number.isInteger(id) || !id)
      return false

    axios
      .get(SETTINGS.API_BASE_PATH + 'pages/' + id)
      .then((response: { data: any }) => {
        cb(response.data)
      })
      .catch((e: any) => {
        cb(e)
      })
  },

  getPosts(limit = 5, cb: { (posts: any): void, (arg0: any): void }) {
    axios
      .get(SETTINGS.API_BASE_PATH + 'posts?per_page=' + limit)
      .then((response: { data: any }) => {
        cb(response.data)
      })
      .catch((e: any) => {
        cb(e)
      })
  },
}
