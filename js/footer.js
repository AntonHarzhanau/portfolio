const footer = document.querySelector(".footer");
const footercontent = 
`
<div class="container">
    <div class="footer-wrapper">
        <ul class="social">
            <li class="social__item">
                <a href="#!"><img src="./img/icons/vk.svg" alt="Vk"></a>
            </li>
            <li class="social__item">
                <a href="#!"><img src="./img/icons/instagram.svg" alt="instagram"></a>
            </li>
            <li class="social__item">
                <a href="https://www.linkedin.com/in/anton-harzhanau-28a114249/"><img src="./img/icons/linkedIn.svg" alt="linkedIn"></a>
            </li>
            <li class="social__item">
                <a href="https://gitlab.unistra.fr/harzhanau"><img src="./img/icons/gitHub.svg" alt="gitHub"></a>
            </li>
        </ul>
    </div>
</div>
`
footer.insertAdjacentHTML("beforeend", footercontent);