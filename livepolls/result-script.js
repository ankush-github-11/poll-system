const html = `
    <div class="box">
        <p class="poll-option"></p>
        <div class="outer-bar">
            <div class="inner-bar">-</div>
        </div>
        <div class="outer-round">
            <div class="inner-round">
                <div class="poll-percentage"></div>
            </div>
        </div>
    </div>
`;
const array1 = ['C', 'C++', 'Java', 'Python', 'Javascript', 'C#', 'PHP', 'Ruby', 'Go', 'Rust', 'HTML', 'Assembly', 'R', 'Swift', 'Kotlin'];
const array2 = ['Summer', 'Monsoon', 'Fall', 'Winter', 'Spring'];
const array3 = ['Smartphone', 'Laptop', 'Smartwatch', 'Tablet'];
let optionsArray = [];
const val = document.querySelector('.view').dataset.value;
if (val == 1) optionsArray = array1;
if (val == 2) optionsArray = array2;
if (val == 3) optionsArray = array3;
let str = document.querySelector('.view-array').value;
str = str.trim();
str = str.split(' ').map(item => item.trim());
const sum = str.reduce((acc, val) => Number(acc) + Number(val), 0);
for (let i = optionsArray.length - 1; i >= 0; i--) {
    document.querySelector('.middle-div-under-1').insertAdjacentHTML('afterbegin', html);
    const box = document.querySelector('.middle-div-under-1 .box:first-child');
    box.querySelector('.poll-option').textContent = optionsArray[i];
    box.querySelector('.inner-bar').textContent = '';
    box.querySelector('.poll-percentage').textContent = String(Math.trunc((str[i] / sum) * 100)) + '%';
}
let key = null;
function handleResize() {
    const screenWidth = window.innerWidth;
    if (screenWidth > 1240 && key !== 'large') {
        document.querySelectorAll('.inner-bar').forEach((bar, i) => {
            bar.style.height = String((str[i] / sum) * 100) + '%';
            bar.style.width = ''; // Reset width
        });
        key = 'large';
    } else if (screenWidth <= 1240 && key !== 'small') {
        document.querySelectorAll('.inner-bar').forEach((bar, i) => {
            bar.style.width = String((str[i] / sum) * 100) + '%';
            bar.style.height = ''; // Reset height
        });
        key = 'small';
    }
}
window.addEventListener('resize', handleResize);
handleResize();
const year = new Date().getFullYear();
document.querySelector(".footer-bottom p").textContent = `© ${year} Poll Now. All rights reserved.`; 
