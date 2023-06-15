
function validateForm() {

    // const currentTime = new Date();
    // // Format the current time as "YYYY-MM-DD HH:MM:SS"
    // const formattedTime = currentTime.toISOString().slice(0, 19).replace("T", " ");
    // document.getElementById("postTime").value = formattedTime;

    const currentTime = new Date();
    const options = { timeZone: 'Asia/Taipei', hour12: false };
    const formattedTime = currentTime.toLocaleString('en-US', options);
    document.getElementById("postTime").value = formattedTime;

       
    
    var comment = document.getElementById('comment').value;
    if (comment.trim() === '') {
      alert('Please enter a comment.');
      return false;
    }

    const radioGroupHelpfulness = document.getElementsByName('rate_helpfulness');
    const radioGroupEasiness = document.getElementsByName('rate_easiness');
    const radioGroupLoading = document.getElementsByName('rate_loading');
    let isChecked = false;
  
    for (let i = 0; i < radioGroupHelpfulness.length; i++) {
      if (radioGroupHelpfulness[i].checked) {
        isChecked = true;
        break;
      }
    }
    if (!isChecked) {
        alert('Please select a rating for Helpfulness.');
        return false; // Prevent form submission
    }

    isChecked = false;
    for(let i = 0; i < radioGroupEasiness.length; i++) {
        if(radioGroupEasiness[i].checked) {
            isChecked = true;
            break;
        }
    }
    if(!isChecked) {
        alert('Please select a rating for Easiness.');
        return false; // Prevent form submission
    }

    isChecked = false;
    for(let i = 0; i < radioGroupLoading.length; i++) {
        if(radioGroupLoading[i].checked) {
            isChecked = true;
            break;
        }
    }
    if(!isChecked) {
        alert('Please select a rating for Loading.');
        return false; // Prevent form submission
    }

    
  
    return true; // Allow form submission
  }


  function clickOutsideModal(event) {
    var modal = document.getElementById('comment-modal');
    if (modal && !modal.contains(event.target)) {
        // Click occurred outside of the modal window, so close the window
        hideCommentWindow();
    }
}

function showCommentWindow(serialNo) {
    // Create the modal/pop-up window element
    var modal = document.createElement('div');
    modal.id = 'comment-modal';
    modal.style.position = 'fixed';
    modal.style.top = '50%';
    modal.style.left = '50%';
    modal.style.transform = 'translate(-50%, -50%)';
    modal.style.width = '500px';
    modal.style.backgroundColor = '#f9f9f9';
    modal.style.padding = '20px';
    modal.style.border = '1px solid #ccc';
    modal.style.borderRadius = '10px'; // Add border-radius for rounded edgess
    modal.style.boxShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
    modal.style.zIndex = '9999';


     // Append the modal window to the document body
     document.body.appendChild(modal);

     // Add event listener to the entire document to close the window when clicking outside
     document.addEventListener('mousedown', clickOutsideModal);

    // Add content to the modal/pop-up window
    modal.innerHTML = `
    <h2>Leave a Comment and Rating</h2>
    <form action="post.php" method="post" id="feedback-form"  onsubmit="return validateForm()">
        <input type="hidden" id="serialNo" name="serial_no" value="${serialNo}">
        <label for="comment">Comment:</label>
        <textarea id="comment" name="content" style="width: calc(100% - 20px); margin-bottom: 10px;"></textarea>
            
        <input type="hidden" id="postTime" name="post_time" value="">

        <label for="helpfulness">Helpfulness:</label>
        <div class="rate">
            <input type="radio" id="star5_helpfulness" name="rate_helpfulness" value="5" />
            <label for="star5_helpfulness" title="text">5 stars</label>
            <input type="radio" id="star4_helpfulness" name="rate_helpfulness" value="4"  />
            <label for="star4_helpfulness" title="text">4 stars</label>
            <input type="radio" id="star3_helpfulness" name="rate_helpfulness" value="3"  />
            <label for="star3_helpfulness" title="text">3 stars</label>
            <input type="radio" id="star2_helpfulness" name="rate_helpfulness" value="2"  />
            <label for="star2_helpfulness" title="text">2 stars</label>
            <input type="radio" id="star1_helpfulness" name="rate_helpfulness" value="1"  />
            <label for="star1_helpfulness" title="text">1 star</label>
        </div>

        <label for="helpfulness">Easiness:</label>
        <div class="rate">
            <input type="radio" id="star5_easiness" name="rate_easiness" value="5" />
            <label for="star5_easiness" title="text">5 stars</label>
            <input type="radio" id="star4_easiness" name="rate_easiness" value="4"  />
            <label for="star4_easiness" title="text">4 stars</label>
            <input type="radio" id="star3_easiness" name="rate_easiness" value="3"  />
            <label for="star3_easiness" title="text">3 stars</label>
            <input type="radio" id="star2_easiness" name="rate_easiness" value="2"  />
            <label for="star2_easiness" title="text">2 stars</label>
            <input type="radio" id="star1_easiness" name="rate_easiness" value="1"  />
            <label for="star1_easiness" title="text">1 star</label>
        </div>

        <label for="loading">Loading:</label>
        <div class="rate">
            <input type="radio" id="star5_loading" name="rate_loading" value="5" />
            <label for="star5_loading" title="text">5 stars</label>
            <input type="radio" id="star4_loading" name="rate_loading" value="4" />
            <label for="star4_loading" title="text">4 stars</label>
            <input type="radio" id="star3_loading" name="rate_loading" value="3" />
            <label for="star3_loading" title="text">3 stars</label>
            <input type="radio" id="star2_loading" name="rate_loading" value="2" />
            <label for="star2_loading" title="text">2 stars</label>
            <input type="radio" id="star1_loading" name="rate_loading" value="1" />
            <label for="star1_loading" title="text">1 star</label>
        </div>


        <button type="submit">Submit</button>
    </form>

`;



    // Append the modal to the document body
    document.body.appendChild(modal);


      // Get the close button element
    var closeButton = modal.querySelector('.close');

    // Add an event listener to hide the modal when the user clicks on the close button
    closeButton.addEventListener('click', hideCommentWindow);

    // Initialize the star rating component
    var ratingStars = modal.querySelectorAll('.star');
    ratingStars.forEach(function(star) {
        star.addEventListener('click', handleStarClick);
        star.addEventListener('mouseenter', handleStarMouseEnter);
        star.addEventListener('mouseleave', handleStarMouseLeave);
    });

    // Function to handle star click event
    function handleStarClick(event) {
        var rating = event.target.dataset.rating;
        var easinessSelect = document.getElementById('easiness');
        easinessSelect.value = rating;
    }

    // Function to handle star mouse enter event
    function handleStarMouseEnter(event) {
        var rating = event.target.dataset.rating;
        var filledStars = modal.querySelectorAll('.star');
        filledStars.forEach(function(star) {
        if (star.dataset.rating <= rating) {
            star.classList.add('filled');
        } else {
            star.classList.remove('filled');
        }
        });
    }

    // Function to handle star mouse leave event
    function handleStarMouseLeave(event) {
        var selectedStars = modal.querySelectorAll('.star');
        selectedStars.forEach(function(star) {
        star.classList.remove('filled');
        });
        }
    
    
    // Add an event listener to hide the modal when the user submits the feedback
    var feedbackForm = document.getElementById('feedback-form');
    feedbackForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting (for this example)
        hideCommentWindow();
    });
}

//redirect to post.php

feedbackForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting (for this example)
  
    var ratingInputs = modal.querySelectorAll('input[name="rate"]');
    var selectedRating;
    ratingInputs.forEach(function(input) {
      if (input.checked) {
        selectedRating = input.value;
      }
    });
  
    var comment = document.getElementById('comment').value;
  
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'post.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response from the server if needed
        console.log(xhr.responseText);
        window.location.href = 'post.php';
      }
    };
   
    xhr.send('rating=' + encodeURIComponent(selectedRating) + '&comment=' + encodeURIComponent(comment));
  
    hideCommentWindow();
  });
  
  

function hideCommentWindow() {
    // Remove the modal/pop-up window from the document body
    var modal = document.getElementById('comment-modal');
    if (modal) {
        modal.remove();
        document.body.removeEventListener('click', clickOutsideModal);
    }
}
