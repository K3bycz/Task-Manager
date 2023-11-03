document.addEventListener('DOMContentLoaded', function() {
    function clock() {
        const now = new Date();
        const options = { timeZone: 'Europe/Warsaw', hour: 'numeric', minute: 'numeric', second: 'numeric' };
        const formattedTime = now.toLocaleTimeString('pl-PL', options);
        document.getElementById('clock').textContent = formattedTime;
    }

    setInterval(clock, 1000);
});
