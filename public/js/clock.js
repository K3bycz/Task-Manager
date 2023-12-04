document.addEventListener('DOMContentLoaded', function() {
    function clock() {
        const now = new Date();
        const optionsTime = { timeZone: 'Europe/Warsaw', hour: 'numeric', minute: 'numeric', second: 'numeric' };
        const formattedTime = now.toLocaleTimeString('pl-PL', optionsTime);

        const optionsDate = { timeZone: 'Europe/Warsaw', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = now.toLocaleDateString('pl-PL', optionsDate);

        const clockElement = document.getElementById('clock');
        clockElement.textContent = formattedTime;

        const dateElement = document.getElementById('date');
        dateElement.textContent = formattedDate;
    }

    setInterval(clock, 1000);
});