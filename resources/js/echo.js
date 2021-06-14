Echo
  .channel('hello')
  .listen('ArticleModified', (e) => {
    alert('тест вэб сокет соединения')
    console.log('sdfsdf')
  });