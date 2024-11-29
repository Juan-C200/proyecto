const hamBurger = document.querySelector(".toggle-btn");
const sidebar = document.querySelector("#sidebar");


hamBurger.addEventListener("click", function () {
  sidebar.classList.toggle("expand");
  
  
});


sidebar.addEventListener("mouseenter", () => {
    if (!sidebar.classList.contains("expand")) {
        sidebar.classList.toggle("expand");
        
    }
});

sidebar.addEventListener("mouseleave", () => {
    if (sidebar.classList.contains("expand")) {
        sidebar.classList.remove("expand");
       
    }
});
