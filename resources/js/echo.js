Echo
  .channel('hello.' + article.id)
  .listen('ArticleModified', (e) => {
    alert(e.article.id);
  });