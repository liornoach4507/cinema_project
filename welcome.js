document.addEventListener("DOMContentLoaded", function() {
    var movies = document.querySelectorAll(".movie");

    movies.forEach(function(movie) {
        movie.addEventListener("click", function() {
            
            var balanceElement = document.querySelector("h4");
            var balance = parseInt(balanceElement.textContent.split(": ")[1]);

            
            if (balance >= 100) {
                Swal.fire({
                    title: 'Movie Purchase Confirmation',
                    text: 'Are you sure you want to purchase this movie for $100?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Purchase'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Get the URL of the movie
                        var movieUrl = movie.getAttribute("data-url");
                        
                        // Redirect to the movie URL
                        window.location.href = movieUrl;

                        // Create a new XMLHttpRequest object for updating balance (optional)
                        var xhr = new XMLHttpRequest();
                        
                        // Configure the request (optional)
                        xhr.open("POST", "update_balance.php", true);
                        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                        // Define the callback function (optional)
                        xhr.onload = function() {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                balanceElement.textContent = "Your balance is: " + response.balance;
                                Swal.fire('Success!', 'You have purchased the movie for $100. Your balance is now updated.', 'success');
                            } else {
                                Swal.fire('Error!', 'There was an error while processing your request.', 'error');
                            }
                        };

                        // Prepare data to send (optional)
                        var data = "confirmed=true";

                        // Send the request (optional)
                        xhr.send(data);
                    }
                });
            } else {
                // הודעה למשתמש אם היתר אינו מספיק
                Swal.fire('Insufficient Balance', 'You don\'t have enough balance to purchase this movie.', 'error');
            }
        });
    });
});

