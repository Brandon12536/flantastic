$(document).ready(function(){
    // Ocultar todas las respuestas
    $(".faq-answer").hide();

    // Mostrar la respuesta correspondiente al botón presionado
    $(".faq-btn").click(function(){
      // Obtener la categoría correspondiente al botón
      var category = $(this).data("category");

      // Ocultar todas las respuestas
      $(".faq-answer").hide();

      // Mostrar la respuesta correspondiente a la categoría
      $(".faq-" + category).show();
    });
  });