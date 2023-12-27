var likeButton = document.querySelector(".like");
var dislikeButton = document.querySelector(".dislike");
var likeCount = document.querySelector(".Llike");
var dislikeCount = document.querySelector(".Ldislike");

// Получить начальное значение из localStorage
var likeState = localStorage.getItem("likeState") || "not-liked";
var dislikeState = localStorage.getItem("dislikeState") || "not-liked";

// Установить начальное значение
if (likeState === "liked") {
    likeButton.classList.add("liked");
}
if (dislikeState === "liked") {
    dislikeButton.classList.add("liked");
}
likeCount.textContent = localStorage.getItem("likeCount") || "0";
dislikeCount.textContent = localStorage.getItem("dislikeCount") || "0";

likeButton.addEventListener("click", function() {
    if (likeState === "not-liked") {
        likeCount.textContent = parseInt(likeCount.textContent) + 1;
        likeButton.classList.add("liked");
        likeState = "liked";

        if (dislikeState === "liked") {
            dislikeCount.textContent = parseInt(dislikeCount.textContent) - 1;
            dislikeButton.classList.remove("liked");
            dislikeState = "not-liked";
            localStorage.setItem("dislikeState", "not-liked");
        }
    } else {
        likeCount.textContent = parseInt(likeCount.textContent) - 1;
        likeButton.classList.remove("liked");
        likeState = "not-liked";
    }

    // Сохранить значение в localStorage
    localStorage.setItem("likeState", likeState);
    localStorage.setItem("likeCount", likeCount.textContent);
});

dislikeButton.addEventListener("click", function() {
    if (dislikeState === "not-liked") {
        dislikeCount.textContent = parseInt(dislikeCount.textContent) + 1;
        dislikeButton.classList.add("liked");
        dislikeState = "liked";

        if (likeState === "liked") {
            likeCount.textContent = parseInt(likeCount.textContent) - 1;
            likeButton.classList.remove("liked");
            likeState = "not-liked";
            localStorage.setItem("likeState", "not-liked");
        }
    } else {
        dislikeCount.textContent = parseInt(dislikeCount.textContent) - 1;
        dislikeButton.classList.remove("liked");
        dislikeState = "not-liked";
    }

    // Сохранить значение в localStorage
    localStorage.setItem("dislikeState", dislikeState);
    localStorage.setItem("dislikeCount", dislikeCount.textContent);
});





function addComment(name) {

    var currentDate = new Date();

    // Получаем текущие день, месяц, год, часы и минуты
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1; // Месяцы в JavaScript начинаются с 0
    var year = currentDate.getFullYear();
    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();

    // Добавляем ведущий ноль, если число состоит из одной цифры
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    if (hours < 10) {
        hours = "0" + hours;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    // Формируем строку с датой и временем
    var currentDateTime = day + "." + month + "." + " " + hours + ":" + minutes;
    const commentInput = document.getElementById('comment-input');


    const comment = commentInput.value.trim();

    if (comment) {
        // Создайте новый комментарий на странице
        const commentElement = createCommentElement(name, comment, currentDateTime);
        // Добавьте комментарий на страницу
        const commentsList = document.getElementById('comments-list');
        commentsList.appendChild(commentElement);
        // Очистите поле ввода
        commentInput.value = '';
    } else {
        alert('Введите комментарий, пожалуйста');
    }
}

function createCommentElement(name, comment, currentDateTime) {
    const commentElement = document.createElement('div');
    commentElement.classList.add('comment');
    commentElement.innerHTML = `
      <div class="comment-author">${name}</div>
      <div class="currentTime">${currentDateTime}</div>
      <div class="comment-text">${comment}</div>
    `;
    return commentElement;

}