@if(Session::has('notify'))
    <div class="alert alert-success pop-up-success" style="position: absolute;z-index: 2;right: 10%" role="alert">
        Статья успешно изменена
    </div>

    <script>
        var alert = document.querySelector('.pop-up-success');

        function hidePopeup(obj){
          setTimeout(function(){
            obj.style.display = 'none';
          }, 2000);
        }
        hidePopeup(alert);

    </script>
@endif
