import { GrNext, GrPrevious } from "react-icons/gr";
import { useState } from "react";

const Slider = ({ slides }) => {
  const [currentIndex, setCurrentIndex] = useState(0);
  const sliderImgs = {
    backgroundImage: `url(${slides[currentIndex].img})`,
  };

  const handleLeftClick = () => {
    const isFirstSlide = currentIndex === 0;
    const newIndex = isFirstSlide ? slides.length - 1 : currentIndex - 1;
    setCurrentIndex(newIndex);
  };
  const handleRightClick = () => {
    const isLastSlide = currentIndex === slides.length - 1;
    const newIndex = isLastSlide ? 0 : currentIndex + 1;
    setCurrentIndex(newIndex);
  };
  return (
    <div className="slider" style={sliderImgs}>
      <h1 className="slider-text">{slides[currentIndex].text}</h1>
      <button className="slider-btn">Let's Go</button>
      <GrPrevious className="slider-left-icon icon" onClick={handleLeftClick} />
      <GrNext className="slider-right-icon icon" onClick={handleRightClick} />
    </div>
  );
};

export default Slider;

Slider.defaultProps = {
  slides: [
    {
      id: 0,
      img: "https://img.freepik.com/free-photo/quiet-rural-trail-panorama_649448-1105.jpg?w=1380&t=st=1683706671~exp=1683707271~hmac=df743887946771a7d2be7493c8be5d1d80278c118b9764b2983b5741f1077502",
      text: "You can spend all your vacation over here. It's just never ending fun",
    },
  ],
};
