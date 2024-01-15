document.addEventListener('DOMContentLoaded', function () {
    const setInitialBalanceButton = document.getElementById('setInitialBalance');

    if (setInitialBalanceButton) {
        setInitialBalanceButton.addEventListener('click', function () {
            setInitialBalance();
        });
    }

    function setInitialBalance() {
        fetch('http://localhost/_46-grupe_/capybaros/homework/bank/counts/store.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'setInitialBalance=true', // Indicate that it's an initial balance request
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json(); // Assuming store.php returns JSON data
            })
            .then(data => {
                // Handle success, e.g., refresh the page or show a success message
                location.reload(); // Refresh the page for simplicity, you may want to handle this differently
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
                // Handle error, e.g., show an error message to the user
            });
    }
});
