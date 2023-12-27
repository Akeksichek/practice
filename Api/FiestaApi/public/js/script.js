let id = null;

const test = (id) => {;
    let url = new URL('http://127.0.0.1:8000/fetchid_video/%7Bid_video%7D');
    url.searchParams.append('video', id);
    window.location.href = url;

};


async function getPosts() {
    let res = await fetch('http://127.0.0.1:8000/api/video')
    let posts = await res.json();
    posts.forEach((video) => {
        document.querySelector('.preview').innerHTML += `
      <div class="photo" onclick = "test(${video.id_video})"><img class="photos" src="${video.preview}" alt="">
      <div class="text">${video.name}</div>
      <div class="name">${video.username}</div>
  </div>
  `
        console.log(video);
    })


}

let imagesfsd = ''

function onFileChange(element) {
    var file = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        imagesfsd = reader.result;
    }
    reader.readAsDataURL(file);
};
getPosts()