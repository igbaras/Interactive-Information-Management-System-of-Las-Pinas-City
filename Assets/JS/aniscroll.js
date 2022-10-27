const html = document.documentElement;
const canvas = document.querySelector('.airpod-scroll');
const context = canvas.getContext("2d");

const frameCount = 77;
const currentFrame = index => (
  `https://res.cloudinary.com/djxbln5ac/image/upload/v1649598252/Sequence/seq${index.toString().padStart(2, '0')}.png`
)

const preloadImages = () => {
  for (let i = 30; i < frameCount; i++) {
    const img = new Image();
    img.src = currentFrame(i);
  }
};

const img = new Image()
img.src = currentFrame(1);
canvas.width=1980;
canvas.height=1080;
img.onload=function(){
  context.drawImage(img, 0, 0);
}

const updateImage = index => {
  img.src = currentFrame(index);
  context.drawImage(img, 0, 0);
}

window.addEventListener('scroll', () => {  
  const scrollTop = html.scrollTop;
  const maxScrollTop = html.scrollHeight - window.innerHeight;
  const scrollFraction = scrollTop / maxScrollTop;
  const frameIndex = Math.min(
    frameCount - 1,
    Math.ceil(scrollFraction * frameCount)
  );
  
  requestAnimationFrame(() => updateImage(frameIndex + 1))
});

preloadImages()