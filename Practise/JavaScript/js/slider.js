const slides = document.querySelectorAll('.slider-image');
let count = 0;
const totalSlides = slides.length;

slides.forEach((slide, index) => {
  slide.style.left = `${index * 100}%`;
});

const slidimg = () => {
  slides.forEach((slide) => {
    slide.style.transform = `translateX(-${count * 100}%)`;
  });
};

const prevImage = () => {
  count--;
  if (count < 0) {
    count = totalSlides - 1;
  }
  slidimg();
};

const nextImage = () => {
  count++;
  if (count >= totalSlides) {
    count = 0;
  }
  slidimg();
};

// Function to automatically slide to the next image
const startAutoSlide = () => {
  setInterval(() => {
    nextImage();
  }, 3000); // Slide every 3 seconds (adjust the time as needed)
};

// Call the function to start automatic sliding
startAutoSlide();


const fruits = ['apple', 'banana', 'orange'];

fruits.forEach(function (fruit, index, array) {
  console.log(`${fruit} is at index ${index} in the array [${array}]`);
});

// apple is at index 0 in the array [apple,banana,orange]
// banana is at index 1 in the array [apple,banana,orange]
// orange is at index 2 in the array [apple,banana,orange]
