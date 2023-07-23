const testimonialsContainer = document.querySelector(".testimonials");

const testimonials = [
  {
    text: "Me encantó el servicio de esta empresa. Siempre respondieron a mis preguntas rápidamente y me ayudaron en todo lo que necesitaba. ¡Muy recomendable!",
    name: "Juan Pérez",
    img: "https://randomuser.me/api/portraits/men/1.jpg",
    rating: 4.5, // Agregamos el campo rating con un valor entre 0 y 5
  },
  {
    text: "Hice mi compra en esta tienda y todo llegó a tiempo y en perfecto estado. Además, tienen una gran variedad de productos. ¡Volveré a comprar aquí!",
    name: "Ana García",
    img: "https://randomuser.me/api/portraits/women/2.jpg",
    rating: 4.5, // Agregamos el campo rating con un valor entre 0 y 5
  },
  {
    text: "El equipo de soporte técnico de esta empresa es excelente. Me ayudaron a resolver un problema con mi cuenta en menos de 24 horas. ¡Muy contento con el servicio!",
    name: "Pedro González",
    img: "https://randomuser.me/api/portraits/men/3.jpg",
    rating: 4.5, // Agregamos el campo rating con un valor entre 0 y 5
  },
];



testimonials.forEach((testimonial) => {
  const testimonialDiv = document.createElement("div");
  testimonialDiv.classList.add("testimonial");

  const img = document.createElement("img");
  img.src = testimonial.img;

  const h2 = document.createElement("h2");
  h2.textContent = testimonial.name;

  const p = document.createElement("p");
  p.textContent = testimonial.text;

  const starsDiv = document.createElement("div");
  starsDiv.classList.add("stars");

  // Agregamos las estrellas
  if (testimonial.rating) {
    const rating = Math.round(testimonial.rating * 2) / 2; // Redondeamos el rating al medio punto más cercano
    for (let i = 0; i < 5; i++) {
      const star = document.createElement("i");
      if (i < rating) {
        star.classList.add("fa", "fa-star", "checked");
      } else if (i == Math.floor(rating) && rating % 1 != 0) {
        star.classList.add("fa", "fa-star-half-o", "checked");
      } else {
        star.classList.add("fa", "fa-star");
      }
      starsDiv.appendChild(star);
    }
  }

  testimonialDiv.appendChild(img);
  testimonialDiv.appendChild(h2);
  testimonialDiv.appendChild(p);
  testimonialDiv.appendChild(starsDiv);

  testimonialsContainer.appendChild(testimonialDiv);

  // Seleccionamos las estrellas dentro del div actual y agregamos el listener
  const stars = testimonialDiv.querySelectorAll(".stars i");

  stars.forEach((star, index) => {
    star.addEventListener("click", () => {
      if (star.classList.contains("checked")) {
        for (let i = index; i < stars.length; i++) {
          stars[i].classList.remove("checked");
        }
      } else {
        for (let i = 0; i <= index; i++) {
          stars[i].classList.add("checked");
        }
      }
    });
  });
});
