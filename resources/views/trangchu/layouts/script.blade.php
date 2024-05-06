<script>
    let list = document.querySelector('.slider .list');
    let items = document.querySelectorAll('.slider .list .item');
    let dots = document.querySelectorAll('.slider .dots li img');
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');

    let active = 0;
    let lengthItems = items.length - 1;
    let refreshSlider = setInterval(() => {
        next.click()
    }, 3000)
    next.onclick = function() {
        if (active + 1 > lengthItems) {
            active = 0;
        } else {
            active = active + 1;
        }
        reloadSlider();
    }
    prev.onclick = function() {
        if (active - 1 < 0) {
            active = lengthItems;
        } else {
            active = active - 1;
        }
        reloadSlider();
    }

    function reloadSlider() {
        let checkLeft = items[active].offsetLeft;
        list.style.left = -checkLeft + 'px';
        let lastActiveDot = document.querySelector('.slider .dots li img.active');
        lastActiveDot.classList.remove('active');
        dots[active].classList.add('active');
        clearInterval(refreshSlider);
        refreshSlider = setInterval(() => {
            next.click()
        }, 3000)
    }

    dots.forEach((li, key) => {
        li.addEventListener('click', function() {
            active = key;
            reloadSlider();
        })
    });
</script>

<script>
    @if (session('alert'))
        window.onload = function() {
            alert('{{ session('alert') }}');
            window.location.reload();
        }
    @endif
    $('.replybtn').click(function() {
        var id = $(this).data("id");
        const form = document.getElementById(id);
        if (form.style.display === 'none') {
            // 👇️ this SHOWS the form
            form.style.display = 'block';
        } else {
            // 👇️ this HIDES the form
            form.style.display = 'none';
        }
    });
</script>

<script>
    const copyBtn = document.getElementById('copyURL');

    copyBtn.addEventListener('click', () => {
        const url = window.location.href;
        navigator.clipboard.writeText(url).then(() => {
            alert('Đã copy link thành công');
        }).catch(() => {
            alert('Copy link thất bại !');
        });
    });
</script>
<script>
    window.onload = function hienthingaythang() {
        const t = new Date();
        let day = t.getDay();
        let d = t.getDate();
        let m = t.getMonth() + 1;
        let y = t.getFullYear();

        let h = t.getHours();
        let mi = t.getMinutes();
        let s = t.getSeconds();

        mi = dinhdang(mi);
        s = dinhdang(s);
        switch (day) {
            case 0:
                day = "Chủ nhật";
                break;
            case 1:
                day = "Thứ hai";
                break;
            case 2:
                day = "Thứ ba";
                break;
            case 3:
                day = "Thứ tư";
                break;
            case 4:
                day = "Thứ năm";
                break;
            case 5:
                day = "Thứ sáu";
                break;
            case 6:
                day = "Thứ bảy";
        }

        document.getElementById("day").innerHTML = day + ", " + d + "/" + m + "/" + y;
        document.getElementById("time").innerHTML = h + ": " + mi + ": " + s;
        setTimeout(hienthingaythang, 1000);
    };

    function dinhdang(x) {
        if (x < 10)
            x = "0" + x;
        return x;
    }
</script>
<script>
    AOS.init();
</script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 6,
    spaceBetween: 20,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>

<script>
    window.setInterval(function() {
    var elem = document.getElementById('tnscroll');
    elem.scrollTop = elem.scrollHeight;
    }, 1000);
</script>