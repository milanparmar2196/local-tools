const cardContainer = document.getElementById("card-container");
const loadMoreButton = document.getElementById("load-more");
const cardCountElem = document.getElementById("card-count");
const cardTotalElem = document.getElementById("card-total");

const cardLimit = 99;
const cardIncrease = 9;
const pageCount = Math.ceil(cardLimit / cardIncrease);
let currentPage = 1;

cardTotalElem.innerHTML = cardLimit;

const getRandomColor = () => {
  const h = Math.floor(Math.random() * 360);

  return `hsl(${h}deg, 90%, 85%)`;
};

const handleButtonStatus = () => {
  if (pageCount === currentPage) {
    loadMoreButton.classList.add("disabled");
    loadMoreButton.setAttribute("disabled", true);
  }
};

const createCard = (index) => {
  const card = document.createElement("div");
  card.className = "productbox";
  card.innerHTML = index;
  card.style.backgroundColor = getRandomColor();
  cardContainer.appendChild(productbox);
};

const addCards = (pageIndex) => {
  currentPage = pageIndex;

  handleButtonStatus();

  const startRange = (pageIndex - 1) * cardIncrease;
  const endRange =
    pageIndex * cardIncrease > cardLimit ? cardLimit : pageIndex * cardIncrease;
  
  cardCountElem.innerHTML = endRange;

  for (let i = startRange + 1; i <= endRange; i++) {
    createCard(i);
  }
};

window.onload = function () {
  addCards(currentPage);
  loadMoreButton.style.backgroundColor = getRandomColor();
  loadMoreButton.addEventListener("click", () => {
    addCards(currentPage + 1);
  });
};

function openNav() {
  document.getElementById ("MSidebar").style.left = "0em";
}

function closeNav() {
  document.getElementById ("MSidebar").style.left = "-20em";
}


function myFunction() {
  var x = document.getElementById("FSM");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}