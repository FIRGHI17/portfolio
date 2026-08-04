const navbar = document.getElementById("navbar");

window.addEventListener("scroll", () => {

    if(window.scrollY > 20){

        navbar.classList.add(
            "bg-[#090909]/90",
            "backdrop-blur-lg",
            "border-b",
            "border-[#222222]"
        );

    }else{

        navbar.classList.remove(
            "bg-[#090909]/90",
            "backdrop-blur-lg",
            "border-b",
            "border-[#222222]"
        );

    }

});

const navbar = document.querySelector(".navbar-wrapper");

window.addEventListener("scroll",()=>{

    if(window.scrollY>40){

        navbar.classList.add("navbar-scrolled");

    }else{

        navbar.classList.remove("navbar-scrolled");

    }

});