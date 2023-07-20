const likeClick = (event) => {
  const likeBtn = event.currentTarget;
  const numberOfLikesElement = likeBtn.nextElementSibling;
  let numberOfLikes = Number.parseInt(numberOfLikesElement.textContent, 10);
  let isLiked = likeBtn.classList.contains('isLiked');

  if (!isLiked) {
    likeBtn.classList.add('isLiked');
    numberOfLikes++;
    numberOfLikesElement.textContent = numberOfLikes;
  } else {
    likeBtn.classList.remove('isLiked');
    numberOfLikes--;
    numberOfLikesElement.textContent = numberOfLikes;
  }
};

// Get all the like buttons and add event listeners to each
const likeButtons = document.querySelectorAll('.heart-icon');
likeButtons.forEach((likeBtn) => {
  likeBtn.addEventListener('click', likeClick);
});