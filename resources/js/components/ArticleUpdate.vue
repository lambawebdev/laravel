<template>
    <div class="article-changes" v-if="hasUpdate">
        <h3>Статья была обновлена</h3>
        <p v-html="'id ' + articleId"></p>
        <p v-html="'Заголовок статьи: ' + articleTitle" v-if="articleTitle != null"></p>
        <p v-html="'Содержание статьи: ' + articleBody" v-if="articleBody != null"></p>
        <a v-bind:href="'/articles/'+ articleId">Ссылка на статью</a>
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
          .private('articles')
          .listen('ArticleModified', (data) => {
            this.hasUpdate = true;
            console.log(data);
            this.articleId = data.article.id;
            this.articleTitle = data.changes.title ?? null;
            this.articleBody = data.changes.body ?? null;
          });
      },
      methods: {
        reload() {
          window.location.reload();
        }
      }
    }
</script>

<style>
    .article-changes {
        display: block;
        position: fixed;
        top: 50px;
        left: 30px;
        background-color: #aeb2a7;
        z-index: 5;
    }
</style>

<!--<button @click.prevent="reload()" class="btn btn-danger">Обновить траницу</button>-->