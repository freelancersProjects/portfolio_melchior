    if (window.location.pathname !== '/portfolio_melchior/public/') {
        document.querySelector('header').classList.remove('background-header');
        document.querySelectorAll('.text-white').forEach(element => {
            element.classList.remove('text-white');
            element.classList.add('text-black');
        });
        document.getElementById('main-name').style.display = 'none';
    }
