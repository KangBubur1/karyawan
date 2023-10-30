// Hamburger

const menu_btn = document.querySelector('.custom-hamburger');
const sidebar = document.querySelector('.mobile-nav');

menu_btn.addEventListener('click', function() {
    menu_btn.classList.toggle('is-active');
    sidebar.classList.toggle('is-active');
    
});


window.addEventListener('resize', function() {
    if (window.innerHeight >= 768) {
        sidebar.classList.remove('is-active');
    }
});

// // Function Hitung
// function start_count(){
//     interval = setInterval("calculateTotal()",1);
// }
// function calculateTotal() {
//     a = document.performa.responsibility.value;
//     b = document.performa.teamwork.value;
//     c = document.performa.management_time.value;
    
//     total = parseInt((a*0.3)+(b*0.3)+(c*0.4));


//     if(total<40){
//                         grade="D";
//                     }else if(total<=59){
//                         grade="C";
//                     }else if(total<=79){
//                         grade="B";
//                     }else if(total<=100){
//                         grade="A";
//                     }
//     document.performa.total.value = total;
//     document.performa.grade.value = grade;
//     console.log(total);
    
// }
// function stop_count(){
//     clearInterval(interval);
// }

