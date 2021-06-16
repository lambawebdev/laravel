<template>
    <div v-if="hasUpdate">
        Статья была обновлена <button @click.prevent="reload()" class="btn btn-danger">Обновить траницу</button>
    </div>
</template>

<script>
    export default {

      props: ['articleId'],
      data() {
        return {
          hasUpdate: false
        }
      },
      mounted() {
        Echo
          .channel('hello.' + this.articleId)
          .listen('ArticleModified', (data) => {
            this.hasUpdate = true;
          })
      },
      methods: {
        reload() {
          window.location.reload();
        }
      }
    }
</script>