const body = document.querySelector("body"),
      modeAlih = body.querySelector(".alih-mode");
      sidebar = body.querySelector("nav");
      sidebarAlih = body.querySelector(".sidebar-alih");

modeAlih.addEventListener("click", () =>{
    body.classList.toggle("dark");
});

sidebarAlih.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})