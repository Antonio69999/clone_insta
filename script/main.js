
// Variables
const likeBtns = document.querySelectorAll('.heart-icon');
const numberOfLikesElements = document.querySelectorAll('.number-of-likes');

// Loop through each like button and count
likeBtns.forEach((likeBtn, index) => {
  const numberOfLikesElement = numberOfLikesElements[index];
  let numberOfLikes = Number.parseInt(numberOfLikesElement.textContent, 10);
  let isLiked = false;

  // Function to handle like button click
  const likeClick = () => {
    if (!isLiked) {
      likeBtn.classList.add('isLiked');
      numberOfLikes++;
      numberOfLikesElement.textContent = numberOfLikes;
      isLiked = true;
    } else {
      likeBtn.classList.remove('isLiked');
      numberOfLikes--;
      numberOfLikesElement.textContent = numberOfLikes;
      isLiked = false;
    }
  };

  // Add event listener to each like button
  likeBtn.addEventListener('click', likeClick);
});
