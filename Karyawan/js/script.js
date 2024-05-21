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

// Live search
const keyword = document.getElementById('keyword');
const tombolCari = document.getElementById('tombol-cari');
const container = document.getElementById('container');

keyword.addEventListener('keyup', function() {
    
    // Buat objek ajax
    const xhr = new XMLHttpRequest();

    // Cek kesiapan ajax
    xhr.onreadystatechange = function() {
        if ( xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', 'ajax/Karyawan_tetap.php?keyword=' + keyword.value, true)
    xhr.send()

})

// Navigate page
