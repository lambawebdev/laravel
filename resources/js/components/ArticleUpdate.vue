<template>
    <div v-if="hasUpdate">
        Статья была обновлена <button @click.prevent="reload()" class="btn btn-danger">Обновить траницу</button>
        <p v-html="articleId"></p>
        <p v-html="articleTitle"></p>
        <p v-html="articleBody"></p>
    </div>
</template>

<script>
    export default {

      // props: ['articleId'],
      data() {
        return {
          hasUpdate: false,
          articleId: null,
          articleTitle: null,
          articleBody: null
        }
      },
      mounted() {
        Echo
          .channel('articles')
          .listen('ArticleModified', (data) => {
            this.hasUpdate = true;
            console.log(data);
            this.articleId = data.article.id;
            this.articleTitle = data.article.title;
            this.articleBody = data.article.body;
          });
      },
      methods: {
        reload() {
          window.location.reload();
        }
      }
    }
</script>