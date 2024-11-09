document.getElementById('mobile-menu-button').addEventListener('click', function() {
    var menu = document.getElementById('mobile-menu');
    // menu.classList.toggle('hidden');
    menu.classList.add('side-bar-open');
  });

document.getElementById('close-menu').addEventListener('click', function() {
    var menu = document.getElementById('mobile-menu');
    // menu.classList.add('hidden');
    menu.classList.remove('side-bar-open');
});


var card_challenges = document.getElementsByClassName('card-challenge');

for (var i = 0; i < card_challenges.length; i++) {
    card_challenges[i].setAttribute('data-aos-delay', i * 200);
    card_challenges[i].setAttribute('data-aos', 'fade-up');
}