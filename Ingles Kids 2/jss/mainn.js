document.addEventListener('DOMContentLoaded',()=>{
    const elementosCarrucel= document.querySelectorAll('.carousel');
    M.Carousel.init(elementosCarrucel,{
        duration: 1500,
        shift: 5, padding: 5, numVisible: 5,
        indicators: true,
        noWrap:false
    });
});