<template>
  <div class="pt-10">
    <template v-if="allPagesLoaded">
      <h1 class="text-3xl mb-5">
        {{ pageContent.title.rendered }}
      </h1>
      <div class="page-content" v-html="pageContent.content.rendered" />
    </template>
    <Loader v-else />
  </div>
</template>

<script lang="ts">
import Loader from '../components/partials/Loader.vue'
import { mapGetters } from 'vuex'
import { defineComponent } from 'vue'

export default defineComponent({
  computed: {
    ...mapGetters({
      page: 'page',
      allPagesLoaded: 'allPagesLoaded'
    }),

    pageContent(): any {
      return this.page(this.$route.params.pageSlug)
    }
  },

  components: {
    Loader
  }
})
</script>
