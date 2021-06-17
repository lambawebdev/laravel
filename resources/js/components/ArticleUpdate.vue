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
          .channel('articles')
          .listen('ArticleModified', (data) => {
            this.hasUpdate = true;
            console.log('Статья изменена');
          })
      },
      methods: {
        reload() {
          window.location.reload();
        }
      }
    }
</script>