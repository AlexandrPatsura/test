$(function (){ 

  /* Объект sendDataComment будет содержать данные для отправки на сервер
  commentForm - переменная, в которую будет помещен клон формы */
  var sendDataComment = {}; 
  var commentForm; 

  // Функция создает форму для ответа путем клонирования нашей спрятанной формы
  function CommentForm(){
    if(commentForm){
      // Проверяем существования клона. Если он уже создан, то удаляем его, а затем создаем новый. 
      removeCommentForm();  
    }

    commentForm = $('#newComment').clone();
  }
      
  // Функция удаления клона 
  function removeCommentForm(){
    commentForm.remove();
    sendDataComment = {};
  }

  // На событие клика по кнопке "Добавить комментарий/Ответить" вешаем необходимые действия
  $('#addNewComment, .reply').click(function(){

    CommentForm(); // Создаем клона формы
          
    if( $(this).attr('id') == 'addNewComment' ){
        // Новый комментарий
        commentForm.prependTo('#commentRoot');
    } else {
      // Новый ответ
      var parentComment = $(this).parent().parent();

      // в sendDataComment добавим идентификатор родителя
      sendDataComment.parent_id = parentComment.attr('id');

      var childs =  parentComment.find('ul'); // Ищем у этого коммента потомков (ответы)
           
      if( ! childs.length ){
        // Если у этого комментария нет  ответов (потомков) добавим для ответов контейнер ul, а затем уже в этот контейнер нашу форму
        parentComment.append('<ul></ul>');
        commentForm.appendTo(parentComment.children('ul'));
      } else {
        commentForm.prependTo(childs); // Добавляем форму в контейнер для ответов
      }
    }

    commentForm.show();

    return false;
  });

  $('#cancelComment').live('click', function(){
    // Здесь live обязательно, т.к. мы работаем не с самой формой, а ее клоном 
    removeCommentForm();
  })

  /* По клику на кнопку "Сохранить", доформировываем объект данных и отправляем их на сервер */
  $('#newComment button').live('click',function(){
    sendDataComment.author = commentForm.find("input[name='name']").val(); 
    sendDataComment.comment = commentForm.find("textarea").val();
    sendData(); // Отправка данных
  });

  // Функция отправки данных комментария на сервер
  function sendData(){
    $.post(
      "savecomment.php",
      sendDataComment, 
      function(data){

        if(data){   
          // Если что-то пришло, значит есть ошибки
          data = $.parseJSON(data); // Преобразовываем пришедшую строку JSON в объект JS 
 
          var errors =''; 
          $.each(data, function(i, val) {
            errors += val+'\n';

          });                    
          alert(errors); 

        } else { 
          formToComment();              
        }
      }
    )
  }

  // Функция преобразование формы в комментарий

  function formToComment(){
    commentForm.find('h6').text(sendDataComment.author);
    commentForm.find('.comment').text(sendDataComment.comment);

    // Удаляем теперь уже лишние элементы
    commentForm.find('button').remove();
    commentForm.find('.loader').remove();
    commentForm.find('#cancelComment').remove();
    commentForm.removeAttr('id');
    commentForm = null; 
  }

});