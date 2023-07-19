// Variables
const likeBtns = document.querySelectorAll('.heart-icon'); // Select all like buttons
const numberOfLikesElements = document.querySelectorAll('.number-of-likes'); // Select all number of likes elements

// Iterate over each like button and attach the click event listener
likeBtns.forEach((likeBtn, index) => {
  const numberOfLikesElement = numberOfLikesElements[index];
  let numberOfLikes = Number.parseInt(numberOfLikesElement.textContent, 10);
  let isLiked = false;
  const pictureId = likeBtn.getAttribute('data-picture-id'); // Get the picture ID from the data attribute

  // Function to handle like button click
  const likeClick = () => {
    // Toggle the like button state
    if (!isLiked) {
      // Send an AJAX request to the PHP script
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'like.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onload = function () {
        if (xhr.status === 200) {
          // Update the number of likes on the page
          numberOfLikes++;
          numberOfLikesElement.textContent = numberOfLikes;
          isLiked = true;
        } else {
          console.error('Error: ' + xhr.status);
        }
      };
      xhr.send(`pictureId=${pictureId}`);
    } else {
      // Handle the case where the user unlikes the photo (optional)
      // You can implement the logic to remove the like from the database if needed
      console.log('Unlike functionality');
    }
  };

  // Attach the click event listener to each like button
  likeBtn.addEventListener('click', likeClick);
});