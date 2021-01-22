const openMenu = document.querySelector('.navbar-toggler-icon');
const closeMenu = document.querySelector('.delete');
const navbarDropDown = document.querySelector('.navbar-nav');

const styleNavbarDropDown = ( 
    position="", 
    top="", 
    paddingTop="",
) => {    
    navbarDropDown.style.position=`${position}`;
    navbarDropDown.style.top=`${top}`;
    navbarDropDown.style.paddingTop=`${paddingTop}`;
}

const styleLogo = (
    opacity="", 
    left="",
) => {    
    document.querySelector('.logo').children[0].style.opacity=`${opacity}`;
    document.querySelector('.logo').children[0].style.left=`${left}`;
}


const hiddenHamburger = () => {
    const attributeNavbar = navbarDropDown.getAttribute('open');

    (attributeNavbar === 'false')? 
    (
        navbarDropDown.setAttribute('open', 'true')
    ) : (
        navbarDropDown.setAttribute('open', 'false') 
    );

    if( attributeNavbar === 'true'){
        head.style.backgroundColor="white";
        styleLogo("0","0px");
        
        setTimeout(() => {
            styleNavbarDropDown(
                "absolute", 
                "0px", 
                "53px"
            );
        }, 500);

        infoNav.classList.add('footer');
        infoCity.innerHTML="Rostov-on-Don, Lenina 21";
    }
    else{
        head.style.backgroundColor="";
        styleNavbarDropDown();

        infoCity.innerHTML="Rostov-on-Don";
        infoNav.classList.remove('footer');
        infoNav.style.display="none";
        
        setTimeout( () => { 
            styleLogo();
            infoNav.style.display="";
        }, 400);

    }

    navbarDropDown.classList.toggle('shadowDropDown')
    openMenu.classList.toggle('hidden');
    closeMenu.classList.toggle('hidden');
    
}

const lightIndicatorCarousel = () => {
    const activeIndicator = carouselNews.querySelector('.carousel-indicators');
    console.log(activeIndicator);
}
 window.onload = lightIndicatorCarousel();

