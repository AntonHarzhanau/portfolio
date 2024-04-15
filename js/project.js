const COUNT_SHOW_CARDS_CLICK = 6;
const proj = document.querySelector(".projects");
const btn_show = document.getElementById("btn-show");

let projData = [];

getprojects();

async function getprojects() {
    try {
        if (!projData.length) {
            const res = await fetch("./requests/getProjects.php");
            if (!res.ok) {
                throw new Error(res.statusText)
            }   
            projData = await res.json();
            console.log(projData);
        }

        renderStartPage(projData);

    } catch (err) {
        console.log(err);
    }
}
function renderStartPage(data) {
    if (!data || !data.length) {
        console.log("error render");
        return; 
    }
    const arrCards = data.slice(0, COUNT_SHOW_CARDS_CLICK);
    if (data.length <= COUNT_SHOW_CARDS_CLICK){
        btn_show.style.display ="none";
    }
    createCards(arrCards);
}

function createCards(data) {
    let i = 1;
    data.forEach(card => {
        const {title, img} = card;
        let newtitle = title + i;
		const cardItem = 
        `
        <li class="project" id="${newtitle}">
            <img src="${img}" alt="project ${title}" class="project_img">
            <h3 class="project_title">${title}</h3>
        </li>
        `
        i = i +1;
        proj.insertAdjacentHTML("beforeend", cardItem);
        var target = document.getElementById(`${newtitle}`);  
        target.addEventListener("click", () => openModal(card));
    })
}

const modalElement = document.querySelector(".modal");

async function openModal(card) {
    modalElement.classList.add("modal--show");
    document.body.classList.add("stop-scrolling");
    modalElement.innerHTML = `
      <div class="modal__card">
            <h1 class="title">${card.title}</h1>
            <div class="project-ditails">
                <img class="project-backdrop" src="${card.img}" alt="" class="project-ditails__cover">
                <div class="project-ditails__discription">
                    <p>${card.description}</p>
                </div>
                <a href="${card.link}" class="btn-outline">
                    <img src="./img/icons/gitHub-black.svg" alt="">
                    Git Repo
                </a>
                <button type="button" class="modal__button-close">&#10006;</button>
            </div>
      </div>
    `
    const btnClose = document.querySelector(".modal__button-close");
    btnClose.addEventListener("click", () => closeModal());
}


function closeModal() {
    modalElement.classList.remove("modal--show");
    document.body.classList.remove("stop-scrolling");
}
window.addEventListener("click", (e) => {
    if (e.target === modalElement) {
      closeModal();
    }
})

let shownCardsCount = COUNT_SHOW_CARDS_CLICK;

btn_show.addEventListener("click", function() {
    loadAdditionalCards();
});

function loadAdditionalCards() {

    const remainingCards = projData.slice(shownCardsCount, shownCardsCount + COUNT_SHOW_CARDS_CLICK);

    createCards(remainingCards);

    shownCardsCount += remainingCards.length;

    if (shownCardsCount >= projData.length) {
        btn_show.style.display = "none";
    }
}

