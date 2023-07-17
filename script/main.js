//Like button

// Variables

const likeBtn = document.querySelector('.heart-icon');
const numberOfLikesElement = document.querySelector('.number-of-likes');

let numberOfLikes = Number.parseInt(numberOfLikesElement.textContent, 10); //parseint s'assure que c'est un nombre entier
let isLiked = false; //indique si le boutton est en état "liked" ou pas. Par défault il n'est pas actionnée en aimé

// Functions

const likeClick = () => {
    if (!isLiked) {             //fonction qui est appelée lorsque le bouton "J'aime" est cliqué. Elle vérifie si le bouton est actuellement dans l'état "aimé" ou non.
        likeBtn.classList.add('isLiked');
        numberOfLikes++;
        numberOfLikesElement.textContent = numberOfLikes;
        isLiked = !isLiked;
    } else {
        likeBtn.classList.remove('isLiked');
        numberOfLikes--;
        numberOfLikesElement.textContent = numberOfLikes;
        isLiked = !isLiked;
    }
};

// Event Listeners

likeBtn.addEventListener('click', likeClick);