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
{{-- <script>
    let speech = new SpeechSynthesisUtterance();
    let voices = [];
    let voiceSelect = document.querySelector("select");

    window.speechSynthesis.onvoiceschanged = () => {
        voices = window.speechSynthesis.getVoices();
        speech.voice.lang = 'vi-EN';

        voices.forEach((voice, i) => (voiceSelect.options[i] = new Option(voice.name, i)))
    };

    voiceSelect.addEventListener("change", () => {
        speech.voice = voices[voiceSelect.value];
    })

    document.querySelector("button").addEventListener("click", () => {
        speech.text = document.querySelector("textarea").value;
        window.speechSynthesis.speak(speech);
    console.log(speech);

    });
</script> --}}