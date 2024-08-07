setTimeout(function() {
    document.querySelector('.spinner-overlay').style.opacity = '0'; // Set opacity to 0
    setTimeout(function() {
        document.querySelector('.spinner-overlay').style.display = 'none'; // Hide the spinner overlay after transition
    }, 500); 
}, 2000); 