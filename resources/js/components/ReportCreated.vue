<template>
    <div class="report-created" v-if="reportCreated">
        <h3>Отчет сформирован</h3>
        <p v-html="'Новостей: ' + news" v-if="news != null"></p>
        <p v-html="'Статей: ' + articles" v-if="articles != null"></p>
        <p v-html="'Комментариев: ' + comments" v-if="comments != null"></p>
        <p v-html="'Тегов: ' + tags" v-if="tags != null"></p>
    </div>
</template>

<script>
    export default {

      data() {
        return {
          reportCreated: false,
          news: null,
          articles: null,
          comments: null,
          tags: null,
        }
      },
      mounted() {
          Echo
            .private('reports')
            .listen('ReportCreated', (data) => {
              this.reportCreated = true;
              this.news = data.reportData.news ?? null;
              this.articles = data.reportData.articles ?? null;
              this.comments = data.reportData.comments ?? null;
              this.tags = data.reportData.tags ?? null;
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
    .report-created {
        display: block;
        position: fixed;
        top: 50px;
        right: 30px;
        background-color: #aeb2a7;
        z-index: 5;
    }
</style>

<!--<button @click.prevent="reload()" class="btn btn-danger">Обновить траницу</button>-->