<script>
    const buttonsOnce = document.querySelectorAll('.button[once]');

    buttonsOnce?.forEach(button => {
        button.addEventListener('click', function () {
            button.innerHTML = 'Wait...';
            button.style.cursor = 'disabled';
            button.style.pointerEvents = 'none';
        });
    });


    const hiddenFields = document.querySelectorAll('.hidden');

    hiddenFields?.forEach(field => {
        const showFields = field.previousElementSibling;

        showFields.addEventListener('click', function () {
            field.classList.toggle('hidden');
        });
    });

    const toggleGiveStar = (message) => {
        const giveStar = document.querySelector('.give-us-a-star');
        giveStar.classList.toggle('display')
    };
    
    const openedCount = parseInt(localStorage.getItem('openedCount') || 0) + 1;
    const hasClosedGiveStar = localStorage.getItem('hasClosedGiveStar') !== null;

    localStorage.setItem('openedCount', openedCount);

    if (openedCount >= 3 && ! hasClosedGiveStar) {
        toggleGiveStar();
    }

    const closeGiveStar = () => {
        localStorage.setItem('hasClosedGiveStar', true);
        toggleGiveStar();
    };

    document.querySelector('#close_give_star')?.addEventListener('click', closeGiveStar);
</script>
