<script>
    let list = document.querySelector('.slider .list');
    let items = document.querySelectorAll('.slider .list .item');
    let dots = document.querySelectorAll('.slider .dots li');
    let prev = document.getElementById('prev');
    let next = document.getElementById('next');

    let active = 0;
    let lengthItems = items.length - 1;
    let refreshSlider = setInterval(() => {next.click()} , 3000)
    next.onclick = function() {
        if(active + 1 > lengthItems) {
            active = 0;
        } else  {
            active = active + 1;
        } reloadSlider();
    }
    prev.onclick = function() {
        if(active - 1 < 0) {
            active = lengthItems;
        } else  {
            active = active - 1;
        } reloadSlider();
    }

    function reloadSlider() {
        let checkLeft = items[active].offsetLeft;
        list.style.left = -checkLeft + 'px';
        let lastActiveDot = document.querySelector('.slider .dots li.active');
        lastActiveDot.classList.remove('active');
        dots[active].classList.add('active');
        clearInterval(refreshSlider);
        refreshSlider = setInterval(() => {next.click()} , 3000)
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
    window.onload = function hienthingaythang()
    {
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
        day = "Thứ sau";
        break;
    case 6:
        day = "Thứ bảy";
    }

    document.getElementById("day").innerHTML = day + ", " +d+ "/"+m+ "/" +y ;
    document.getElementById("time").innerHTML = h + ": " + mi + ": " + s;
    setTimeout(hienthingaythang, 1000);
    };

    function dinhdang(x) {
        if(x < 10) 
            x = "0" + x;
        return x;
    }
</script>
