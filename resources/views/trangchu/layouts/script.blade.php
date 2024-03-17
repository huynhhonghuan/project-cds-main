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